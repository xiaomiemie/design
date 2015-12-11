//会在这个页面自动trigger 第一页的标签
define(['jquery', 'message'], function($, Message) {
  function tablePage(opts) {
    this.opts = $.extend({}, tablePage.DEFAULTS, opts);
    this.elPage = this.opts.elPage;
    this.elTable = this.opts.elTable;
    this.opts.data.pageNum = 1;
    this.elPage.off('click', 'a');
    // this.elPage.off('click', this.elPage.find('span').eq(0));
    // this.elPage.off('click', this.elPage.find('span').eq(1));
    this.bindEvent();
    $('#nav-page').find('a').eq(0).trigger('click');
  }
  tablePage.prototype.loadData = function(thatopt) {
    console.log(thatopt)
    var that = this;
    $.ajax({
      type: 'GET',
      url: thatopt.url,
      data: thatopt.data
    }).success(function(data) {
      console.log(data);
      if (data == 1) {
        var mes = new Message.Message({
          data: '请先登录',
          type: 'alert-warning'
        });
      } else if (data == 0) {
        var mes = new Message.Message({
          data: '操作异常',
          type: 'alert-danger'
        });
      } else {
        console.log(data)
        that.renderTable(data.data);
        that.renderPage(data.totalCount);
      }
    }).fail(function() {
      console.log('err')
    })
  }

  tablePage.prototype.renderTable = function(data) {
    var elTable = this.elTable;
    elTable.empty();
    var that = this;
    var arr = [];
    if (data) {
      var len = data.length;
      if (len > 0) {
        for (var i = 0; i < len; i++) {
          var str = '<tr><td>' + data[i].realname + '</td><td>' + data[i].nickname + '</td><td><button class="btn btn-info sendMsg" data-id="' + data[i].nickname + '">发送系统消息</button>&nbsp;<button class="btn btn-info delUser" data-id="' + data[i].nickname + '">删除该用户</button></td></tr>';
          arr.push(str);
        }
      } else {
        str = '<tr><td colspan="3" align="center">对不起，暂时没有用户</td></tr>';
        arr.push(str);
      }
    } else {
      str = '<tr><td colspan="3" align="center">对不起，暂时没有用户</td></tr>';
      arr.push(str);
    }
    var res = arr.join('');
    elTable.append(res);
  }
  tablePage.prototype.renderPage = function(data) {
    var elPage = this.elPage;
    var that = this;
    elPage.empty();
    var pageNum = that.opts.data.pageNum;
    var pageCount = Math.ceil(data / that.opts.data.pageSize);
    var str = '<ul class="pagination">';
    for (var i = 1; i <= pageCount; i++) {
      str = str + '<li><a href="#">' + i + '</a></li>'
    }
    str += '</ul>'
    elPage.append(str);
    var li = elPage.find('li');
    li.removeClass('active');
    li.eq(pageNum - 1).addClass('active');
    // if (pageNum == 1) {
    //   li.eq(0).addClass('disabled');
    //   elPage.off('click',li.eq(0).find('span'));
    // } else {
    //   li.eq(0).removeClass('disabled');
    // }
    // if (pageNum == pageCount) {
    //   li.eq(pageCount + 1).addClass('disabled');
    //   elPage.off('click',li.eq(li.eq(pageCount + 1)).find('span'));
    // } else {
    //   li.eq(pageCount + 1).removeClass('disabled');
    // }
  }

  tablePage.prototype.bindEvent = function() {
    var elPage = this.elPage;
    var that = this;
    var elTable = this.elTable;
    elPage.empty();
    elPage.append('<ul class="pagination"><li><a href="#">1</a></li></ul>');
    elPage.on('click', 'a', function() {
      var val = $(this).html();
      that.opts.data.pageNum = $(this).html();

      console.log(that)
      that.loadData(that.opts);
    });

    elTable.on('click', '.delUser', function() {
        var thatel = this;
        var optdata = that.opts.data;
        var val = {
          data: {},
          url: 'searchUser'
        };

        //  else {
        //   val.data.pageNum = optdata.pageNum;
        // }
        $.ajax({
          url: 'delUser',
          type: 'POST',
          data: {
            id: $(thatel).data('id')
          }
        }).success(function(data) {
          console.log(data)
          if (data == 1) {
            var mes = new Message.Message({
              data: '删除成功',
              type: 'alert-success'
            });
        if (elTable.find('tr').length == 1) { //如果这一夜只有一个
          // if (optdata.pageNum == 1) {
          //   val.data.pageNum = 1;
          // } else {
          //   val.data.pageNum = optdata.pageNum - 1;
          // }
          if(optdata.pageNum!=1){
            optdata.pageNum=optdata.pageNum-1;
          }
        }
            that.loadData(that.opts);
          } else if (data == 'err') {
            var mes = new Message.Message({
              data: '请先登录',
              type: 'alert-warning'
            });
          } else {
            var mes = new Message.Message({
              data: '操作异常',
              type: 'alert-danger'
            });
          }
        })
      })
      // elPage.on('click',elPage.find('span').eq(0),function(){    
      //       that.opts.data.pageNum = that.opts.data.pageNum - 1;
      //       that.loadData();
      // });
      //     elPage.on('click',elPage.find('span').eq(1),function(){    
      //       that.opts.data.pageNum = that.opts.data.pageNum - 1;
      //       that.loadData();

    // })

  }

  tablePage.DEFAULTS = {
    clearTable: false,
    data: {
      pageSize: 3,
    }
  }
  return {
    tablePage: tablePage
  }
})