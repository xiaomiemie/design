define(['jquery', 'loadlist', 'scrollto', 'leftscroll', 'typeclick', 'message', 'comfn'], function($, loadList, scrollto, leftScroll, typeClick, Message, comfn) {
  var cf = new comfn.commonFn();
  cf.bwMatch();
  if (cf.jMeteor.browserName == 'msie' && parseInt(cf.jMeteor.browser.version) <= 8) {
    $('body').html('请使用Chrome，Firedox，Safari，IE9及以上版本等浏览器');

  } else {
    var scrollto = new scrollto.scrollTo({
      el: $('.toolbar .toolbar-item')
    });
    scrollto.move();

    $('.loginnickName').on('click', function() {
      if ($('ul.menu-ul').css('display') == 'none') {
        $('ul.menu-ul').show()
      } else {
        $('ul.menu-ul').hide()
      }
    });

    //左边菜单栏
    var leftscroll = new leftScroll.leftScroll({
      el: $('.leftlist')
    });
    leftscroll.bindEvent();

    var typeclick = new typeClick.typeClick({
      el: $('.leftlist .list-group')
    });
    typeclick.bindEvent();
    typeclick.clickEvent();

    //搜索框
    $('#searchbutton').on('click', function() {
      $('.list-group a').removeClass('active');
      var type = $('#searchtype').val();
      var keyvalue = $('#searchinput').val();
      var load = new loadList.loadList({
        url: 'search',
        el: $('.rightlist .goodlist'),
        clearList: true,
        data: {
          type: type,
          keyvalue: keyvalue,
          pageSize: 3
        } //传入的是ul
      });
    })
  }


})