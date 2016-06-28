VK.init({
    apiId: 5382063
});

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

var membersGroups = []; // массив участников группы
getMembers('ansarsharia');

// получаем информацию о группе и её участников
function getMembers(gr_id) {
	
	VK.Api.call('groups.getById', {group_id: gr_id, fields: 'photo_50,members_count', v: '5.52'}, function(r) {
			if(r.response) {
				getMembers20k(gr_id, r.response[0].members_count); // получаем участников группы и пишем в массив membersGroups
				var index;
				for (index = 0; index < membersGroups.length; ++index) {
					console.log(membersGroups[index]);
				}
				membersGroups.forEach(function(item, i, membersGroups) {
					var code2 = 'var audio = API.audio.get({"owner_id": 301935746, "v": "5.52"}).items;'
					+ 'return audio;';
					alert(code2);
					VK.Api.call("execute", {code: code2}, function(data) {
						if (data.response) {
							console.log(data.response);
						} else {
							alert(data.error.error_msg); // в случае ошибки выведем её
						}
					});
				});
			}
	});
}

// получаем участников группы, members_count - количество участников
function getMembers20k(group_id, members_count) {
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
			membersGroups = membersGroups.concat(JSON.parse("[" + data.response + "]")); // запишем это в массив
			$('.member_ids').html('Загрузка: ' + membersGroups.length + '/' + members_count);
			if (members_count >  membersGroups.length) // если еще не всех участников получили
				setTimeout(function() { getMembers20k(group_id, members_count); }, 333); // задержка 0.333 с. после чего запустим еще раз
			else // если конец то
				alert('end');
		} else {
			alert(data.error.error_msg); // в случае ошибки выведем её
		}
	});
	
}
















