<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DO IT TOMORROW</title>
    <link rel="stylesheet" href="<?php echo UrlHelper::getUrl("asset/css/bootstrap.min.css") ?>">
    <link rel="stylesheet" href="<?php echo UrlHelper::getUrl("asset/css/theme.css") ?>">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>DO IT TOMORROW</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <input type="text" class="form-control input-lg" placeholder="What should I do?" name="task">
        </div>
        <div class="col-md-4">
            <a class="btn btn-primary btn-lg btn-block" href="<?php echo UrlHelper::getUrl("todo/create") ?>"
               role="button" data-action="create" onclick="return false;">Remember</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Task</th>
                    <th>Done?</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($todos as $i => $todo): ?>
                    <tr class="<?php echo $todo->getDone() ? "success" : "" ?>">
                        <td><?php echo $i + 1 ?></td>
                        <td><?php echo $todo->getTask() ?></td>
                        <td>
                            <?php if (!$todo->getDone()): ?>
                                <a class="btn btn-success btn-xs"
                                   href="<?php echo UrlHelper::getUrl("todo/done/" . $todo->getId()) ?>" role="button"
                                   data-action="done" onclick="return false;">Done</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row <?php echo count($todo) ? "" : "hidden" ?>">
        <div class="col-md-12">
            <a class="btn btn-danger btn-lg" href="<?php echo UrlHelper::getUrl("todo/clear") ?>" role="button"
               data-action="clear" onclick="return false;">Remove Completed</a>
        </div>
    </div>
</div>
<script id="rowTemplate" type="x-template">
    <tr>
        <td>$1</td>
        <td>$2</td>
        <td><a class="btn btn-success btn-xs" href="<?php echo UrlHelper::getUrl("todo/done") ?>/$3" role="button"
               data-action="done" onclick="return false;">Done</a></td>
    </tr>
</script>
<script src="<?php echo UrlHelper::getUrl("asset/js/jquery-3.1.1.min.js") ?>"></script>
<script src="<?php echo UrlHelper::getUrl("asset/js/main.js") ?>"></script>
</body>
</html>
