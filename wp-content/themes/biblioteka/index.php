<?php
get_header();
?>

<div id="main-content" class="main-content">
    <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">
            <div>

                <?php
                global $wpdb;
                $book_table = $wpdb->prefix . 'biblioteka';
                $books = $wpdb->get_results("SELECT * FROM $book_table", ARRAY_A);
                ?>
                <h3>Wyświetl wszystkie książki:</h3>
                <form id="books_list">
                    <?php
                    $ajax_link = admin_url('admin-ajax.php');
                    ?>
                    <table>
                        <thead>
                            <tr>
                                <th class="cell-1">Tytuł</th>
                                <th class="cell-2">Autor</th>
                                <th class="cell-3">Rok wydania</th>
                                <th class="cell-4">Wydawca</th>
                                <th class="cell-5">Opis</th>
                                <th class="cell-6">Opcje</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($books as $book) { ?>
                                <?php //                                                var_dump($book);?>
                                <tr class="book_id_<?php echo $book['id']; ?>">
                                    <td class="cell-1"><input type="text" name="title" value="<?php echo $book['title']; ?>"></td>
                                    <td class="cell-2"><input type="text" name="author" value="<?php echo $book['author']; ?>"></td>
                                    <td class="cell-3"><input type="number" name="year" value="<?php echo $book['year']; ?>"></td>
                                    <td class="cell-4"><input type="text" name="publisher" value="<?php echo $book['publisher']; ?>"></td>
                                    <td class="cell-5"><textarea name="description" rows="1"><?php echo $book['description']; ?></textarea></td>
                                    <!--<td class="cell-6"><input name='zapisz' value="zapisz" action='edit_book'><input name='usun' value="usun"></td>-->
                                    <td class="cell-6">
                                        <a class="edit_book" book_id='<?php echo $book['id']; ?>' href="<?php echo $ajax_link . '?action=edit_book&id=' . $book['id']; ?>">Zapisz</a>
                                        <a class="delete_book" href="<?php echo $ajax_link . '?action=delete_book&id=' . $book['id']; ?>">Usuń</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        <span id="end_holder" style="width: 1px; height: 1px; display: block; position: absolute;"></span>
                        </tbody>
                    </table>
                </form>
            </div>
            <div>
                <h3>Dodaj nową książkę:</h3>
                <form id="ajax_add_new_book">
                    <table>
                        <thead>
                            <tr>
                                <th>Tytuł</th>
                                <th>Autor</th>
                                <th>Rok wydania</th>
                                <th>Wydawca</th>
                                <th>Opis</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input id="title" type="text" name="title"></td>
                                <td><input id="author" type="text" name="author"></td>
                                <td><input id="year" type="number" name="year"></td>
                                <td><input id="publisher" type="text" name="publisher"></td>
                                <td><textarea id="description" name="description" rows="1"></textarea></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit" class="btn">Submit</button>
                </form>
            </div>
        </div><!-- #content -->
    </div><!-- #primary -->
</div><!-- #main-content -->
<?php
get_footer();
