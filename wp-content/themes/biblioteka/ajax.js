jQuery(document).ready(function() {
    jQuery('#ajax_add_new_book').submit(function() {
        var title = jQuery("#title").val();
        var author = jQuery("#author").val();
        var year = jQuery("#year").val();
        var publisher = jQuery("#publisher").val();
        var description = jQuery("#description").val();
        jQuery.ajax({
            data: {action: 'add_new_book', title: title, author: author, year: year, publisher: publisher, description: description},
            type: 'post',
            dataType: 'json',
            url: myAjax.ajaxurl,
            success: function(data) {
                jQuery('<tr class="book_id_' + data.new_book.id + '"><td class="cell-1"><input type="text" name="title" value="' + data.new_book.title + '"></td><td class="cell-2"><input type="text" name="author" value="' + data.new_book.author + '"></td><td class="cell-3"><input type="number" name="year" value="' + data.new_book.year + '"></td><td class="cell-4"><input type="text" name="publisher" value="' + data.new_book.publisher + '"></td><td class="cell-5"><textarea name="description" rows="1">' + data.new_book.description + '</textarea></td><td class="cell-6"><input name="zapisz" value="zapisz"><input name="usun" value="usun"></td></tr>').insertAfter(jQuery('.book_id_' + (data.new_book.id - 1)));
                jQuery('<div class="message_success">' + data.new_book.id + '</div>').insertAfter(jQuery('#ajax_add_new_book'));
            },
            error: function(data) {
                alert('Wystąpił błąd krytyczny aplikacji ;)');
            }
        });
        return false;
    });

    function getURLParameter(url, name) {
        return (RegExp(name + '=' + '(.+?)(&|$)').exec(url) || [, null])[1];
    }

    jQuery(".delete_book").click(function(e) {
        e.preventDefault();
        var url = jQuery(this).attr('href');
        var id = getURLParameter(url, 'id');
        var row = jQuery(this).parent().parent();
        jQuery.ajax({
            type: 'post',
            dataType: 'json',
            url: myAjax.ajaxurl,
            data: {action: 'delete_book', book_id: id},
            success: function(data) {
                row.hide();
            },
            error: function(data) {
                alert('Wystąpił błąd krytyczny aplikacji ;)');
            }
        });
        return false;
    });

    jQuery(".edit_book").click(function(e) {
        e.preventDefault();
        var url = jQuery(this).attr('href');
        var id = getURLParameter(url, 'id');
        var title = jQuery(this).parent().parent().find('input[name="title"]').val();
        var author = jQuery(this).parent().parent().find('input[name="author"]').val();
        var year = jQuery(this).parent().parent().find('input[name="year"]').val();
        var publisher = jQuery(this).parent().parent().find('input[name="publisher"]').val();
        var description = jQuery(this).parent().parent().find('textarea[name="description"]').val();
        var button = jQuery(this);
        jQuery.ajax({
            type: 'post',
            dataType: 'json',
            url: myAjax.ajaxurl,
            data: {action: 'edit_book', title: title, author: author, year: year, publisher: publisher, description: description, book_id: id},
            success: function(data) {
                jQuery('.success_msg').hide();
                jQuery('<div class="success_msg"><p>' + data.message + '</p></div>').insertAfter(button);
            },
            error: function(data) {
                alert('Wystąpił błąd krytyczny aplikacji ;)');
            }
        });
        return false;
    });
});
