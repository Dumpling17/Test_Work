<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<link rel="stylesheet" href="style.css">

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<?php
require_once("db.php");

$db = new Database();

$comments = $db->get_rows("SELECT * FROM comments");
?>

<script>
    $(function(){
        $('.send-comment').on('click', function(){
            let name = $('.name');
            let data_birth = $('.data-birth');
            let comment_text = $('.comment-text');
            
            if (name.val().length > 0 && data_birth.val().length > 0 && comment_text.val().length > 0) {
                let collector = {
                    'name': name.val(),
                    'data-birth': data_birth.val(),
                    'text-comment': comment_text.val()
                };
                
                $.post('send.php', collector, function(data) {
                    $('.list-comments').append(
                        '<div class="comment">' +
                            '<div>' + name.val() + '</div>' +
                            '<div class="text-comment">' + comment_text.val() + '</div>' +
                        '</div>'
                    );
                    
                    name.val('');
                    data_birth.val('');
                    comment_text.val('');
                });
            }
        });
    });
</script>

<div>
    <div class="row col-md-12">
        <div class="row col-md-6 list-comments">
            <?php
            for ($i = 0; $i < count($comments); $i++) {
                echo 
                    '<div class="comment">
                        <div>' . $comments[$i]['name'] . '</div>
                        <div class="text-comment">' . $comments[$i]['text'] . '</div>
                    </div>';
            }
            ?>
        </div>
    </div>
    
    <div class="add-comment">
        <div class="row">
            <span class="col-md-2">Введите Ваше имя:</span>
            <input type="text" style="width: 250px; display: inline;" class="form-control name">
        </div>
        <div class="row">
            <span class="col-md-2">Введите Вашу дату рождения:</span>
            <input type="date" style="width: 250px; display: inline;" class="form-control data-birth">
        </div>
        <div class="row">
            <span class="col-md-2">Введите текст комментария:</span>
            <textarea type="text" style="width: 250px; display: inline;" class="form-control comment-text"></textarea>
        </div>
        <div>
            <button class="btn send-comment">Отправить</button>
        </div>
    </div>
</div>