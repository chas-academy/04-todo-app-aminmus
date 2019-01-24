<header class="header">
    <h1>todos</h1>
    <?php
    if (!empty($add_error)) :
        echo "<span class='error-message'>" . $add_error . "</span>";
    endif ?>
    <form id="create-todo" method="post" action="todos">
        <input name="title" class="new-todo" placeholder="What needs to be done?" autofocus>
    </form>
</header>

<section class="main">
    <input id="toggle-all" class="toggle-all" type="checkbox">
    <label for="toggle-all">Mark all as complete</label>
</section>
