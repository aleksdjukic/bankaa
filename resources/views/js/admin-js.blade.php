<script>
    function modal()
    {
        function deleteModal()
        {
            $('.deletemodal').css('display','flex');
            $(".deleteq").removeClass('closeModal')
            $(".deleteq").addClass('openModal')
        }
        $('.forma').submit(function(e)
        {
            e.preventDefault();
            t=$(this);
            $('.ne').click(function(){
                $('.deletemodal').css('display','none');
                $(".deleteq").addClass('closeModal')
            })
            $('.da').click(function(){
                $.when().then(function(){
                    $(t).off("submit").submit()
                })
            })
        })
    }
    // SORT
    function sort(page, res)
    {
        $.ajax({
            cache: false,
            // async:false,
            url: page,
            type: "GET",

            beforeSend: function ()
            {
                $('#'+res+'').html('<div class="loader-admin-panel"><img src="./images/ajax-loader.gif"></div>');
            },
            success: function (respond)
            {
                $('#'+res+'').html(respond);
                modal();
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log(XMLHttpRequest);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }
    // VISIBILITY
    function visibility(page, id, br)
    {
        $.ajax({

            cache: false,
            url: page + '?id=' + id + '&br=' + br,
            type: "GET",
            beforeSend: function ()
            {
                $('.btn').attr("disabled", "disabled")
            },
            success: function (respond)
            {
                $('#' + id).html(respond);
                setTimeout(function(){
                    $('.btn').removeAttr("disabled").removeClass('disabled')
                }, 1000);
                $('.btn').attr("disabled", "disabled").addClass('disabled')
                modal();
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log(XMLHttpRequest);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }
    // SEARCH
    var searchTimer;
    function search(page, input, res)
    {
        clearTimeout(searchTimer)
        function search2(page, input, res)
        {
            var query_value = $('input#'+input+'').val();
            $.ajax({
                cache: false,
                url: page,
                type: "GET",
                data:
                    {
                        filter: query_value
                    },
                beforeSend: function ()
                {
                    $('#' + res + '').html('<div class="loader-ajax"><img src="./images/ajax-loader.gif"></div>');
                },
                success: function (respond) {
                    $('#' + res + '').html(respond);
                    modal();
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
        }
        searchTimer = setTimeout(function () {
            search2(page, input, res);
        }, 600);
    }
    function paginate(route, page, res)
    {
        sort = page.split('?')[1]
        route = route + '?' + sort

        $.ajax({
            cache: false,
            url: route,
            type: "GET",

            beforeSend: function ()
            {
                $('#' + res + '').html('<div class="loader-ajax"><img src="./images/ajax-loader.gif"></div>');
            },
            success: function (respond)
            {
                $('#' + res + '').html(respond);
                modal();
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log(XMLHttpRequest);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }
</script>
