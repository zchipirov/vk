VK.init({
    apiId: 5382063
});

VK.Auth.login(function(response) {
  if (response.session) {
    /* ������������ ������� ������������� */
    if (response.settings) {
      /* ��������� ��������� ������� ������������, ���� ��� ���� ��������� */
    }
  } else {
    /* ������������ ����� ������ ������ � ���� ����������� */
  }
});

var membersGroups = []; // ������ ���������� ������
getMembers('ansarsharia');

// �������� ���������� � ������ � � ����������
function getMembers(group_id) {
	alert(group_id);
	VK.Api.call('groups.getById', {group_id: group_id, fields: 'photo_50,members_count', v: '5.52'}, function(r) {
			if(r.response) {
				alert(r.response[0].members_count);
				getMembers20k(group_id, r.response[0].members_count); // �������� ���������� ������ � ����� � ������ membersGroups
			}
	});
}

// �������� ���������� ������, members_count - ���������� ����������
function getMembers20k(group_id, members_count) {
	var code =  'var members = API.groups.getMembers({"group_id": ' + group_id + ', "v": "5.27", "sort": "id_asc", "count": "1000", "offset": ' + membersGroups.length + '}).items;' // ������ ������ ������ � ������� ������
			+	'var offset = 1000;' // ��� ����� �� ���������� ������
			+	'while (offset < 25000 && (offset + ' + membersGroups.length + ') < ' + members_count + ')' // ���� �� �������� 20000 � �� �������� �� ���� ����������
			+	'{'
				+	'members = members + "," + API.groups.getMembers({"group_id": ' + group_id + ', "v": "5.27", "sort": "id_asc", "count": "1000", "offset": (' + membersGroups.length + ' + offset)}).items;' // ����� ���������� �� offset + �������� �������
				+	'offset = offset + 1000;' // ����������� ����� �� 1000
			+	'};'
			+	'return members;'; // ������� ������ members
	
	VK.Api.call("execute", {code: code}, function(data) {
		if (data.response) {
			membersGroups = membersGroups.concat(JSON.parse("[" + data.response + "]")); // ������� ��� � ������
			$('.member_ids').html('��������: ' + membersGroups.length + '/' + members_count);
			if (members_count >  membersGroups.length) // ���� ��� �� ���� ���������� ��������
				setTimeout(function() { getMembers20k(group_id, members_count); }, 333); // �������� 0.333 �. ����� ���� �������� ��� ���
			else // ���� ����� ��
				alert('��� ���� ��������! � ������� membersGroups ������ ' + membersGroups.length + ' ���������.');
		} else {
			alert(data.error.error_msg); // � ������ ������ ������� �
		}
	});
}