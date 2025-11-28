var menus = {};

$('ol.sortable').nestedSortable({
    handle: 'div',
    items: 'li',
    toleranceElement: '> div',
    stop: function (e, u) {
        saveMenus();
    }
});

function saveMenus() {
    menus = {};
    $('.sortable > li').each(function (i, v) {
        var menu = {
            tiitle: $(v).attr('data-title'),
            id: $(v).attr('data-id'),
            parent: 0,
            pos: i + 1,
            children: []
        }
        menus[i] = menu;
        if ($(v).find(' > ol > li').length > 0) {
            $(v).find(' > ol > li').each(function (subI, subV) {
                var menu = {
                    tiitle: $(subV).attr('data-title'),
                    id: $(subV).attr('data-id'),
                    parent: $(v).attr('data-id'),
                    pos: subI + 1,
                    children: []
                }
                menus[i].children[subI] = menu;
                if ($(subV).find('ol > li').length > 0) {
                    $(subV).find('ol > li').each(function (subII, subVV) {
                        var menu = {
                            tiitle: $(subVV).attr('data-title'),
                            id: $(subVV).attr('data-id'),
                            parent: $(subV).attr('data-id'),
                            pos: subII + 1,
                            children: []
                        }
                        menus[i].children[subI].children[subII] = menu;
                    });
                }
            });
        }
    });
    $.ajax({
        type: 'post',
        url: '/' + ADMIN_LINK + '/menu/sort_menu/' + sectionId,
        data: {menus: menus},
        beforeSend: function (data) {
            $('.sort-save-loader').show(0);
        },
        success: function (data) {
            $('.sort-save-loader').hide(0);

        },
        error: function (error) {
            $('.sort-save-loader').hide(0);
        }
    })
}

$(document).ready(function () {

    let timeOut;
    $('.menu-url').keyup(function (e) {

        clearTimeout(timeOut);

        const lang = $(this).attr('data-lang');
        const title = $(this).val();
        const id = $('#hidden-id').val();

        if (title.trim().length > 2 && parseInt(id) === 0) {


            timeOut = setTimeout(function () {
                $.ajax({
                    type: 'post',
                    url: '/' + ADMIN_LINK + '/menu/slugify',
                    data: {
                        lang: lang,
                        title: title,
                    },
                    dataType: 'json',
                    beforeSend: function (data) {

                    },
                    success: function (data) {

                        if (!data.error) {
                            $('[name=url_' + lang + ']').val(data.url)
                        }


                    },
                    error: function (error) {

                    }
                })


            }, 2000)
        }


    })

})