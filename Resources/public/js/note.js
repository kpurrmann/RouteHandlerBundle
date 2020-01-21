$('form[name=note_route_form]').submit(function (e) {
    e.preventDefault();
    console.log($(this).data);
});

