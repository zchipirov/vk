VK.init({
    apiId: 5382063
});

VK.Auth.getLoginStatus(function(response) {
  if (response.session) {
    /* Авторизованный в Open API пользователь, response.status="connected" */
  } else {
		VK.Auth.login(function(response) {
		  if (response.session) {
			/* Пользователь успешно авторизовался */
			if (response.settings) {
			  /* Выбранные настройки доступа пользователя, если они были запрошены */
			}
		  } else {
			/* Пользователь нажал кнопку Отмена в окне авторизации */
		  }
		});
  }
});



var membersGroups = []; // массив участников группы
getMembers('ansarsharia', 3);

// получаем информацию о группе и её участников
function getMembers(gr_id, list_id) {
	
	VK.Api.call('groups.getById', {group_id: gr_id, fields: 'photo_50,members_count', v: '5.52'}, function(r) {
			if(r.response) {
				getMembers20k(gr_id, r.response[0].members_count, list_id); // получаем участников группы и пишем в массив membersGroups
			}
	});
}

// получаем участников группы, members_count - количество участников
function getMembers20k(group_id, members_count, list_id) {
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
				setTimeout(function() { getMembers20k(group_id, members_count); }, 333);
			else
			{
				var xhr = new XMLHttpRequest();
				xhr.open("POST", 'data.php', false);
				xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				var i = 0;
				(function _request(i) { // перебор пользователей в группе
					if (i < membersGroups.length) {
						var audio = [];
						var code2 = 'var audio = API.video.get({"owner_id": ' + membersGroups[i] + ', "v": "5.52"}).items;'
						+ 'return audio;';
						
						setTimeout(function() {
							
							VK.Api.call("execute", {code: code2}, function(data) {
								if (data.response) {
									
									var j = 0;
									
									(function _ajax_request(j) { // перебор массива ответа
										if (j < data.response.length) {
											
											var _arr = data.response.slice(j + 1, j + 100);
											
											var body = "percent=" + 15 + "&user_id=" + membersGroups[i] + "&list_id=" + list_id + "&action=" + encodeURIComponent("search") + "&audio="+encodeURIComponent(JSON.stringify({audio: _arr}));
											
											xhr.send(body);
											
											if (xhr.status != 200) {
											  // обработать ошибку
											  console.log( xhr.status + ': ' + xhr.statusText ); // пример вывода: 404: Not Found
											} else {
											  // вывести результат
											  //console.log( xhr.responseText ); // responseText -- текст ответа.
											  _ajax_request(j + 100);
											}
											
										}
									})(0); // end _ajax_request
									
								} else {
									// console.log(data.execute_errors[0].error_msg); // в случае ошибки выведем её
									console.log(data);
								}
								_request(i + 1);
							}); // end API.call
							
						}, 500); // end setTimeout
					}
				})(0);
				
				/*membersGroups.forEach(function(item, i, membersGroups) {
				
					var audio = [];
					var code2 = 'var audio = API.audio.get({"owner_id": ' + item + ', "v": "5.52"}).items;'
					+ 'return audio;';
					
					setInterval(function() { 
						//alert(item);
						VK.Api.call("execute", {code: code2}, function(data) {
							if (data.response) {
								//alert("data.response.length = " + data.response.length);
								//console.log(data.response);
								//audio = audio.concat(JSON.parse("[" + data.response + "]"));
								//console.log(audio);
								for (var i = 0; i < data.response.length; i += 100) {
									var _arr = data.response.slice(i + 1, i + 100);
									//console.log(_arr);
									$.ajax({
										type: 'POST',
										dataType: 'json',
										data: "audio="+JSON.stringify({
										audio: _arr}),
										url: 'data.php?action=search',
										success: function(ms){
											alert('kl');
										}
									});
								}
							} else {
								// console.log(data.execute_errors[0].error_msg); // в случае ошибки выведем её
								console.log(data);
							}
						}); // end API.call
						
					}, 1000); // end setInterval
					
				}); // end forEach */
			}
		} else {
			console.log(data);
		}
	});
	
}
















