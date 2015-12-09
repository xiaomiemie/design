define(['jquery','message'],function($,Message){
  function tablePage(opts){
    var c = Math.ceil(Math.random() * 100000);
    this.c=c+'class';
    this.opts=$.extend({},tablePage.DEFAULTS,opts);
    this.elPage=this.opts.elPage;
    
    this.elTable=this.opts.elTable;
    this.opts.data.pageNum=1;
    this.elPage.off('click','a');
    this.bindEvent();  
    $('#nav-page').find('a').eq(1).trigger('click');
  }
  tablePage.prototype.loadData=function(){
    var that = this;
    $.ajax({
      type:'GET',
      url:'searchUser',
      data:that.opts.data
    }).success(function(data){
      console.log(data)
    }).fail(function(){
      console.log('err')
    })
  }
  
  tablePage.prototype.bindEvent=function(){
    var elPage=this.elPage;
    var that = this;
    elPage.empty();
    elPage.append('<ul class="pagination"><li><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li><li><a href="#">1</a></li><li><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li></ul>');
    elPage.on('click','a',function(){
      that.opts.data.pageNum=$(this).html();
      that.loadData();
    });
  }
  tablePage.prototype.pageLoad=function(){
    
  }
  
  tablePage.DEFAULTS={
    clearTable:false,
    data:{
      pageSize:20,
    }
  }
  return {
    tablePage:tablePage
  }
})