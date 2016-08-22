var membersGroups = []; // массив участников группы
//getMembers('ansarsharia', 3);

// получаем информацию о группе и её участников
function getMembers(source, gr_id, list_id, percent) {
	
	VK.Api.call('groups.getById', {group_id: gr_id, fields: 'photo_50,members_count', v: '5.53'}, function(r) {
			if(r.response) {
				getMembers20k(source, gr_id, r.response[0].members_count, list_id, percent); // получаем участников группы и пишем в массив membersGroups
			}
	});
}

function getMembers2(source, list_id, percent, user_id)
{
	// перебор пользователей в группе
	var code2 = ""; // 
	switch (source) {
	  case 'audio':
		code2 = 'var audio = API.audio.get({"owner_id": ' + user_id + ', "v": "5.53"}).items; return audio;';
		break;
	  case 'video':
		code2 = 'var video = API.video.get({"owner_id": ' + user_id + ', "v": "5.53"}).items; return video;';
		break;
	  case 'docs':
		code2 = 'var docs = API.docs.get({"owner_id": ' + user_id + ', "v": "5.53"}).items; return docs;'
		break;
	  case 'groups':
		code2 = 'var groups = API.groups.get({"user_id": ' + user_id + ', "v": "5.53", "extended": "1"}).items; return groups;'
		break;
	  case 'friends':
		code2 = 'var friends = API.friends.get({"user_id": ' + user_id + ', "v": "5.53", "fields": "domain"}).items; return friends;'
		break;
	}
	
	VK.Api.call("execute", {code: code2}, function(data) {
		
		if (data.response) {
			var j = -1;
			var g = 0;
			var cnt = 0;
			(function _ajax_request(j) { // перебор массива ответа
				if (j < data.response.length) {
					try{
						var _arr = data.response.slice(j + 1, j + 100);
						var xhr = new XMLHttpRequest();
						var body = "source=" + source 
							+ "&percent=" + percent 
							+ "&user_id=" + user_id 
							+ "&list_id=" + list_id 
							+ "&action=" + encodeURIComponent("search") 
							+ "&data=" + encodeURIComponent(JSON.stringify({data: _arr}));
						xhr.open("POST", 'data.php', false);
						xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
						xhr.send(body);
						
						if (xhr.status != 200) {
							console.log("ERROR:" + xhr.status + ': ' + xhr.statusText );
						} else {
							var obj = jQuery.parseJSON(xhr.responseText);
							console.log(obj);
							if (obj != null) {
								for (var k = 0; k < obj.length; k++) {
									cnt += 1;
									if (source == 'audio')
										$("<tr><td>"+ (cnt) +"</td><td><a target='_blank' href='http://vk.com/id" + obj[k].user_id + "'>" + 
											obj[k].user_id+"</a></td><td>"+obj[k].title+"</td><td>" + obj[k].percent + " %</td><td><a href='" + obj[k].url + "' target='_blank'>открыть</a></td></tr>").insertAfter($("tr:last"));
									if (source == 'video')
										$("<tr><td>"+ (cnt) +"</td><td><a target='_blank' href='http://vk.com/id" + obj[k].user_id + "'>" +
											obj[k].user_id + "</a></td><td>" + obj[k].title + "</td><td>" + obj[k].duration + "</td><td>" + obj[k].percent + " %</td><td><a href='" + obj[k].player+"' target='_blank'>открыть</a></td></tr>").insertAfter($("tr:last"));
									if (source == 'docs')
										$("<tr><td>"+inx+"</td>"+
											"<td><a target='_blank' href='http://vk.com/id"+obj[k].user_id+"'>"+obj[k].user_id+"</a></td>"+
											"<td>"+obj[k].title+"</td>"+
											"<td>" + obj[k].size + " %</td>"+
											"<td><a href='"+obj[k].url+"' target='_blank'>открыть</a></td></tr>").insertAfter($("tr:last"));
									if (source == 'groups')
										$("<tr><td>"+inx+"</td>"+
											"<td><a target='_blank' href='http://vk.com/id"+obj[k].user_id+"'>"+obj[k].user_id+"</a></td>"+
											"<td>"+obj[k].name+"</td></tr>").insertAfter($("tr:last"));
									if (source == 'friends')
										$("<tr><td>"+inx+"</td>"+
											"<td><a target='_blank' href='http://vk.com/id"+obj[k].user_id+"'>"+obj[k].user_id+"</a></td>"+
											"<td>"+obj[k].first_name+" "+obj[k].last_name+"</td></tr>").insertAfter($("tr:last"));
									$("#search_result").html(cnt);
								}
							}
							var f = 0;
							if (j + 100 >= data.response.length && g == 0) {
								f = j;
								g = 1;
							}
							else
								f = j + 100;
							_ajax_request(f);
						}
					}
					catch(e) {}
				}
			})(0); // end _ajax_request перебор массива ответа
			
		} else {
			// console.log(data.execute_errors[0].error_msg); // в случае ошибки выведем её
			//console.log(data);
		}
	}); // end API.call
}

// получаем участников группы, members_count - количество участников
function getMembers20k(source, group_id, members_count, list_id, percent) {
	var code1 =  'var members = API.groups.getMembers({"group_id": ' + "\""+group_id + "\"" + ', "v": "5.53", "sort": "id_asc", "count": "1000", "offset": ' + membersGroups.length + '}).items;' // делаем первый запрос и создаем массив
			+	'var offset = 1000;' // это сдвиг по участникам группы
			+	'while (offset < 25000 && (offset + ' + membersGroups.length + ') < ' + members_count + ')' // пока не получили 20000 и не прошлись по всем участникам
			+	'{'
				+	'members = members + "," + API.groups.getMembers({"group_id": ' + "\""+group_id + "\"" + ', "v": "5.53", "sort": "id_asc", "count": "1000", "offset": (' + membersGroups.length + ' + offset)}).items;' // сдвиг участников на offset + мощность массива
				+	'offset = offset + 1000;' // увеличиваем сдвиг на 1000
			+	'};'
			+	'return members;'; // вернуть массив members
	
	VK.Api.call("execute", {code: code1}, function(data1) {
		if (data1.response) {
			membersGroups = membersGroups.concat(JSON.parse("[" + data1.response + "]"));			
			if (members_count >  membersGroups.length)
				setTimeout(function() { getMembers20k(source, group_id, members_count); }, 333);
			else
			{
				$("#group_count").html(membersGroups.length);
				var inx = 1;
				var i = 0;
				var fl = 0;
				
				(function _request(i) { // перебор пользователей в группе
					
					if (i < membersGroups.length) {
						
						var code2 = ""; // 
						switch (source) {
						  case 'audio':
							code2 = 'var audio = API.audio.get({"owner_id": ' + membersGroups[i] + ', "v": "5.53"}).items; return audio;';
							break;
						  case 'video':
							code2 = 'var video = API.video.get({"owner_id": ' + membersGroups[i] + ', "v": "5.53"}).items; return video;';
							break;
						  case 'docs':
							code2 = 'var docs = API.docs.get({"owner_id": ' + membersGroups[i] + ', "v": "5.53"}).items; return docs;'
							break;
						  case 'groups':
							code2 = 'var groups = API.groups.get({"user_id": ' + membersGroups[i] + ', "v": "5.53", "extended": "1"}).items; return groups;'
							break;
						  case 'friends':
							code2 = 'var friends = API.friends.get({"user_id": ' + membersGroups[i] + ', "v": "5.53", "fields": "domain"}).items; return friends;'
							break;
						}	

						setTimeout(function() {
							VK.Api.call("execute", {code: code2}, function(data) {
								
								console.log(data);
								if (data.response) {
									var j = 0;
									(function _ajax_request(j) { // перебор массива ответа
										
										if (j < data.response.length) {
											try {
												var _arr = data.response.slice(j + 1, j + 100);
												var xhr = new XMLHttpRequest();
												var body = "source=" + source 
													+ "&percent=" + percent 
													+ "&user_id=" + membersGroups[i] 
													+ "&list_id=" + list_id 
													+ "&action=" + encodeURIComponent("search") 
													+ "&data=" + encodeURIComponent(JSON.stringify({data: _arr}));
												xhr.open("POST", 'data.php', true);
												xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
												xhr.send(body);
												
												if (xhr.status != 200) {
													console.log("ERROR:" + xhr.status + ': ' + xhr.statusText);
												} else {
													var obj = jQuery.parseJSON(xhr.responseText);
													if (obj != null) {
														for (var k = 0; k < obj.length; k++) {
															fl = 1;
															$("#search_result").html(inx);
															if (source == 'audio')
																$("<tr><td>"+inx+"</td><td><a target='_blank' href='http://vk.com/id"+obj[k].user_id+"'>"+obj[k].user_id+"</a></td><td>"+obj[k].title+
																	"</td><td>" + obj[k].percent + " %</td><td><a href='"+obj[k].url+"' target='_blank'>открыть</a></td></tr>").insertAfter($("tr:last"));
															if (source == 'video')
																$("<tr><td>"+inx+"</td><td><a target='_blank' href='http://vk.com/id"+obj[k].user_id+"'>"+obj[k].user_id+"</a></td><td>"+obj[k].title+
																	"</td><td>"+obj[k].duration+"</td><td>" + obj[k].percent + " %</td><td><a href='"+obj[k].player+"' target='_blank'>открыть</a></td></tr>").insertAfter($("tr:last"));
															if (source == 'docs')
																$("<tr><td>"+inx+"</td>"+
																	"<td><a target='_blank' href='http://vk.com/id"+obj[k].user_id+"'>"+obj[k].user_id+"</a></td>"+
																	"<td>"+obj[k].title+"</td>"+
																	"<td>" + obj[k].size + " %</td>"+
																	"<td><a href='"+obj[k].url+"' target='_blank'>открыть</a></td></tr>").insertAfter($("tr:last"));
															if (source == 'groups')
																$("<tr><td>"+inx+"</td>"+
																	"<td><a target='_blank' href='http://vk.com/id"+obj[k].user_id+"'>"+obj[k].user_id+"</a></td>"+
																	"<td>"+obj[k].name+"</td></tr>").insertAfter($("tr:last"));
															if (source == 'friends')
																$("<tr><td>"+inx+"</td>"+
																	"<td><a target='_blank' href='http://vk.com/id"+obj[k].user_id+"'>"+obj[k].user_id+"</a></td>"+
																	"<td>"+obj[k].first_name+"</td><td>"+obj[k].last_name+"</td></tr>").insertAfter($("tr:last"));
															$("#save").html("Сохранить в Excel (" + inx + " записей)");
														   inx += 1;
														}
													}
													_ajax_request(j + 100);
												}
											}
											catch(e) {console.log(e);}
										}
									})(0); // end _ajax_request перебор массива ответа
									if (fl == 1) {
										var ff = parseInt($("#user_result").html(), 10);
										$("#user_result").html(ff + 1);
									}
								} else {
									// console.log(data.execute_errors[0].error_msg); // в случае ошибки выведем её
									//console.log(data);
								}
								$("#search_status").html(i+1 + "/" + membersGroups.length);
								_request(i + 1);
							}); // end API.call
							
						}, 1500); // end setTimeout
						
					}
					fl = 0;
				})(0); // end перебор пользователей в группе
				
			}
		} else {
			console.log(data1);
		}
	});
	
}
















