$("#searchField")
    .focusout(function () {
        const q = $(this).val();

        $.ajax({
            url: "/api/user/search",
            method: "POST",
            data: { search: q },
            success: function (users) {
                var $el = $("#nameField");
                $el.empty(); // remove old options
                $.each(users, function (key, value) {
                    console.log(key, value)
                    $el.append(
                        $("<option></option>").attr("value", key).text(value)
                    );
                });
            },
        });
    })
    .change();
