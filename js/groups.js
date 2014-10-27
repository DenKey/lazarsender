    function delete_group(name, group_id) {
        $.prompt("Удалить группу '" + name + "' и все адреса в ней?", {
            title: "Вы уверены ?",
            buttons: {
                "Удалить": true,
                "Нет,не нужно": false
            },
            submit: function(e, v, m, f) {
                if (v) {
                    delete_ajax(group_id);
                }
            }
        });
    }

    function delete_ajax(group_id) {
        $.ajax({
            type: "POST",
            url: "handlers/groups/delete_group.php",
            data: {
                id: group_id
            },
            error: function(xhr, str) {
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        }).done(function() {
            window.location.reload();
        });
    }


    function edit_group(name, group_id) {
        var newName = prompt("Введите новое имя для группы:", name);
        newName = $.trim(newName);
        if (newName != "") {
            $.ajax({
                type: "POST",
                url: "handlers/groups/edit_group.php",
                data: {
                    id: group_id,
                    newname: newName
                },
                error: function(xhr, str) {
                    alert('Возникла ошибка: ' + xhr.responseCode);
                }
            }).done(function() {
                window.location.reload();
            });
        }
    }


    function add_group() {
        var msg = $('#formx').serialize();
        $.ajax({
            type: "POST",
            url: "handlers/groups/add_group.php",
            data: msg,
            error: function(xhr, str) {
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        }).done(function() {
            window.location.reload();
        });
    }