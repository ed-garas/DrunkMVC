(function ($) {
    var template = $('#rowTemplate').text();
    $('a[data-action=create]').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('href'), method: 'post',
            data: {task: $('input[name=task]').val()}
        }).done(function (data) {
            $('table tbody').append(template.replace('$1', $('table tbody tr').length + 1).replace('$2', data.task).replace('$3', data.id));
            $('a[data-action=clear]').closest('div.row.hidden').removeClass('hidden');
        });
    });
})(jQuery);
(function ($) {
    $(document).on('click', 'a[data-action=done]', function (e) {
        e.preventDefault();
        $this = $(this);
        $.ajax({url: $this.attr('href'), method: 'post'}).done(function () {
            $this.closest('tr').addClass('success');
            $this.remove();
        });
    });
})(jQuery);
(function ($) {
    $('a[data-action=clear]').on('click', function (e) {
        e.preventDefault();
        $this = $(this);
        $.ajax({url: $this.attr('href'), method: 'post'}).done(function () {
            $('table').find('tr.success').remove();
            $('table tbody tr').length || $this.closest('div.row').addClass('hidden');
        });
    });
})(jQuery);
