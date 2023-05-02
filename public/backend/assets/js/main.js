(function () {
	"use strict";

	var treeviewMenu = $('.app-menu');

	// Toggle Sidebar
	$('[data-toggle="sidebar"]').click(function(event) {
		event.preventDefault();
		$('.app').toggleClass('sidenav-toggled');
	});

	// Activate sidebar treeview toggle
	$("[data-toggle='treeview']").click(function(event) {
		event.preventDefault();
		if(!$(this).parent().hasClass('is-expanded')) {
			treeviewMenu.find("[data-toggle='treeview']").parent().removeClass('is-expanded');
		}
		$(this).parent().toggleClass('is-expanded');
	});

	// Set initial active toggle
	$("[data-toggle='treeview.'].is-expanded").parent().toggleClass('is-expanded');

	//Activate bootstrip tooltips
	$("[data-toggle='tooltip']").tooltip();

})();


function changeTitle(){
    $( ".name" )
      .keyup(function() {
        var name = $( this ).val();
        var slug;

        //Đổi chữ hoa thành chữ thường
        slug = name.toLowerCase();

        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');

        $( ".slug" ).attr('value',slug);
      })
      .keyup();
}
function checkPrice(){
    var regular_price = parseInt($('.regular_price').val());
    var sale_price = 0;
    $('.regular_price').keyup(function(){
        regular_price = $(this).val();
    }).keyup();

    $('.sale_price').keyup(function(){
        sale_price = parseInt($(this).val());
        if(sale_price > regular_price){
            $( ".regular_price" ).attr('value','').val(0);
            $( ".sale_price" ).attr('value','').val(0);
        }
        var discount = ((regular_price - sale_price)/regular_price)*100;
        // var discount = (sale_price *100) /regular_price;
        $('.discount' ).attr('value',discount.toFixed(0));
    }).keyup();
}

function checAll(){
    $(".checkAll").click(function(){
        $('input:checkbox').not('.arrStatus').prop('checked', this.checked);
    });
}

// Realtime Notification
function realtimeNotification(){
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('1e38bdbfaf17ff456b05', {
        cluster: 'ap1'
    });

    var channel = pusher.subscribe('notification-channel');
    channel.bind('payment-event', function(data) {
        countNotification();
        orderNotification(data);
    });
}

function countNotification(){
    let current_notification = $('.chuong-notification').text();
    let future_notification = parseInt(current_notification)+1;
    $('.chuong-notification').text(future_notification);
    // toastr.success(a, data.name)
}

function orderNotification(data){
    toastr.success(data.name,"1 Đơn hàng mới cần xử lý")
}

$(document).ready(function() {
    changeTitle();
    checkPrice();
    checAll();
    realtimeNotification();
});
