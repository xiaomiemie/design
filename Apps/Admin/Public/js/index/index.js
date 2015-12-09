define(['jquery', 'mygoodlist', 'scrollto', 'message', 'bootstrap','tablepage'], function($, myGoodList, scrollto, Message, bootstrap,tablePage) {
  var scrollto = new scrollto.scrollTo({
    el: $('.toolbar .toolbar-item')
  });
  scrollto.move();

  //

  $('#myTabs a').click(function(e) {
    e.preventDefault()
    $(this).tab('show')
  });
  

  //信息搜索框
  $('#searchinfobutton').on('click', function() {
    var keyvalue = $('#searchinfoinput').val();
    var load = new myGoodList.myGoodList({
      url: 'searchInfo',
      el: $('#info .goodlist'),
      clearList: true,
      data: {
        keyvalue: keyvalue,
        pageSize: 3
      } //传入的是ul
    });
  });
  $('#searchinfobutton').trigger('click');
  
  //删除信息
  $('.goodlist').on('click', '.delbutton', function() {
    if (confirm('确定要删除吗')) {
      var data = {};
      var that = this;
      data.goodid = $(this).data('id');
      $.ajax({
        type: 'POST',
        url: 'delInfo',
        data: data
      }).success(function(data) {
        if (data == 1) {
          var mes = new Message.Message({
            data: '删除成功',
            type: 'alert-success'
          });
          $(that).parents('li').remove();
        } else {
          var mes = new Message.Message({
            data: '操作异常',
            type: 'alert-danger'
          });
        }
      }).fail(function() {
        var mes = new Message.Message({
          data: '操作异常',
          type: 'alert-danger'
        });
      })
    }
  });
  
  $('#searchuserbutton').on('click',function(){
    var tp = new tablePage.tablePage({
      elPage:$('#nav-page'),
      elTable:$('.usertbody'),
      data:{
        keyvalue:$('#searchuserinput').val()
      }
    });
  })



})