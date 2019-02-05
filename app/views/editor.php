<div class="editor tasks">
    <div class="editor__content view-port">
        <h1 class="reg__title">Редактировать задачу</h1>
        <form class="editor__form" action="/edit/save" method="POST">
            <textarea class="editor__text" name="editor_text" required><?= $text; ?></textarea>
            <input type="hidden" value="<?= $id; ?>" name="editor_id">
            <div class="editor__buttons">
                <button class="editor__save" name="editor_submit" type="submit">Сохранить</button>
                <a class="editor__return" href="/">Назад</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>