<?
use views\ViewHelper;
?>
<div class="tasks">
    <div class="tasks__sort view-port">
        <div class="tasks__sort_text">Сортировать:</div>
        <select class="tasks__sort_select">
            <option value="id_desc" <?= ViewHelper::checkOrder('id_desc'); ?>>Сначала новые</option>
            <option value="id_asc" <?= ViewHelper::checkOrder('id_asc'); ?>>Сначала старые</option>
            <option value="name_asc" <?= ViewHelper::checkOrder('name_asc'); ?>>Имя (по возрастанию)</option>
            <option value="name_desc" <?= ViewHelper::checkOrder('name_desc'); ?>>Имя (по убыванию)</option>
            <option value="mail_asc" <?= ViewHelper::checkOrder('mail_asc'); ?>>Почта (по возрастанию)</option>
            <option value="mail_desc" <?= ViewHelper::checkOrder('mail_desc'); ?>>Почта (по убыванию)</option>
            <option value="status_desc" <?= ViewHelper::checkOrder('status_desc'); ?>>Статус (сначала выполненные)</option>
            <option value="status_asc" <?= ViewHelper::checkOrder('status_asc'); ?>>Статус (сначала невыполненные)</option>
        </select>
    </div>
    <div class="tasks__content view-port">

		<? foreach ($tasks as $task): ?>
            <div class="tasks__item" data-id="<?= $task['id']; ?>">
                <div class="tasks__item_descr">
                    <div class="tasks__item_name">
                        <span>Имя пользователя:</span>
                        <span><?= ViewHelper::compare($task['name'], $task['guest_name']); ?></span>
                    </div>
                    <div class="tasks__item_mail">
                        <span>Почта:</span>
                        <span><?= ViewHelper::compare($task['mail'], $task['guest_mail']); ?></span>
                    </div>
                    <div class="tasks__item_status">
                        <span>Статус задачи:</span>
                        <span><?= ViewHelper::parseStatus($task['status']); ?></span>
                    </div>

                    <? if (isset($user) && !empty($user->isAdmin())) : ?>
                        <div class="tasks__item_edit">
                            <a class="tasks__item_edit_button" href="/main/edit?id= <?=$task['id'];?> ">Редактировать</a>
                            <label class="tasks__item_edit_text">Выполнено
                                <input class="tasks__item_edit_check" type="checkbox" <? if ($task['status'] === 2) echo 'checked'; ?>>
                            </label>
                        </div>
                    <? endif; ?>

                </div>
                <div class="tasks__item_text">
                    <div class="tasks__item_text_title">Задача:</div>
                    <div class="tasks__item_text_content"><?= $task['text']; ?></div>
                </div>
            </div>
		<? endforeach; ?>

    </div>
    <div class="tasks__pager view-port">
        <? for ($i = 1; $i <= ceil(count($tasks) / ViewHelper::TASKS_IN_PAGE); $i++) { ?>
            <div class="tasks__pager_button" data-page="<?= $i?>"><?= $i?></div>
        <?} ?>
    </div>
</div>
</body>
</html>
