var membersGroups = []; // массив участников группы
//getMembers('ansarsharia', 3);

// получаем информацию о группе и её участников
function getMembers(source, gr_id, list_id, percent) {
	
	VK.Api.call('groups.getById', {group_id: gr_id, fields: 'photo_50,members_count', v: '5.52'}, function(r) {
			if(r.response) {
				getMembers20k(source, gr_id, r.response[0].members_count, list_id, percent); // получаем участников группы и пишем в массив membersGroups
			}
	});
}

// получаем участников группы, members_count - количество участников
function getMembers20k(source, group_id, members_count, list_id, percent) {
	var code =  'var members = API.groups.getMembers({"group_id": ' + "\""+group_id + "\"" + ', "v": "5.52", "sort": "id_asc", "count": "1000", "offset": ' + membersGroups.length + '}).items;' // делаем первый запрос и создаем массив
			+	'var offset = 1000;' // это сдвиг по участникам группы
			+	'while (offset < 25000 && (offset + ' + membersGroups.length + ') < ' + members_count + ')' // пока не получили 20000 и не прошлись по всем участникам
			+	'{'
				+	'members = members + "," + API.groups.getMembers({"group_id": ' + "\""+group_id + "\"" + ', "v": "5.52", "sort": "id_asc", "count": "1000", "offset": (' + membersGroups.length + ' + offset)}).items;' // сдвиг участников на offset + мощность массива
				+	'offset = offset + 1000;' // увеличиваем сдвиг на 1000
			+	'};'
			+	'return members;'; // вернуть массив members
	
	VK.Api.call("execute", {code: code}, function(data) {
		if (data.response) {
			membersGroups = membersGroups.concat(JSON.parse("[" + data.response + "]"));			
			if (members_count >  membersGroups.length)
				setTimeout(function() { getMembers20k(source, group_id, members_count); }, 333);
			else
			{
				$("#group_count").html(membersGroups.length);
				var inx = 1;
				var i = 0;
				(function _request(i) { // перебор пользователей в группе
					if (i < membersGroups.length) {
						var code2 = ""; // 
						switch (source) {
						  case 'audio':
							code2 = 'var audio = API.audio.get({"owner_id": ' + membersGroups[i] + ', "v": "5.52"}).items; return audio;';
							break;
						  case 'video':
							code2 = 'var video = API.video.get({"owner_id": ' + membersGroups[i] + ', "v": "5.52"}).items; return video;';
							break;
						  case 'docs':
							code2 = 'var docs = API.docs.get({"owner_id": ' + membersGroups[i] + ', "v": "5.52"}).items; return docs;'
							break;
						  case 'groups':
							code2 = 'var groups = API.docs.get({"user_id": ' + membersGroups[i] + ', "v": "5.52", "extended": "1"}).items; return groups;'
							break;
						  case 'friends':
							code2 = 'var friends = API.friends.get({"user_id": ' + membersGroups[i] + ', "v": "5.52", "fields": "domain"}).items; return friends;'
							break;
						}
						
						setTimeout(function() {
							
							VK.Api.call("execute", {code: code2}, function(data) {
								if (data.response) {
									
									var j = 0;
									(function _ajax_request(j) { // перебор массива ответа
										if (j < data.response.length) {
											try{
												var _arr = data.response.slice(j + 1, j + 100);
												var xhr = new XMLHttpRequest();
												var body = "source=" + source 
													+ "&percent=" + percent 
													+ "&user_id=" + membersGroups[i] 
													+ "&list_id=" + list_id 
													+ "&action=" + encodeURIComponent("search") 
													+ "&data=" + encodeURIComponent(JSON.stringify({data: _arr}));
												xhr.open("POST", 'data.php', false);
												xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
												xhr.send(body);
												
												if (xhr.status != 200) { // обработать ошибку
													console.log("ERROR:" + xhr.status + ': ' + xhr.statusText ); // пример вывода: 404: Not Found
												} else {
													var obj = jQuery.parseJSON(xhr.responseText);
													for (var k = 0; k < obj.length; k++) {
														//if (source == 'audio')
														$("#search_result").html(inx)
														// $("<tr><td>"+inx+"</td><td><a target='_blank' href='http://vk.com/id"+obj[k].user_id+"'>"+obj[k].user_id+"</a></td><td>"+obj[k].title+"</td><td><a href='"+obj[k].url+"' target='_blank'>открыть</a></td></tr>").insertAfter($("tr:last"));
														$("#save").html("Сохранить в Excel (" + inx + " записей)");
													   inx += 1;
													}
													_ajax_request(j + 100);
												}
											}
											catch(e) {}
										}
									})(0); // end _ajax_request перебор массива ответа
									
								} else {
									// console.log(data.execute_errors[0].error_msg); // в случае ошибки выведем её
									console.log(data);
								}
								$("#search_status").html(i + "/" + membersGroups.length);
								_request(i + 1);
							}); // end API.call
							
						}, 800); // end setTimeout
						
					}
				})(0); // end перебор пользователей в группе
				
			}
		} else {
			console.log(data);
		}
	});
	
}
















