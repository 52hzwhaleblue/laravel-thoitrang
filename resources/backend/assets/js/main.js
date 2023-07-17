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
      });
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
            $( ".discount" ).attr('value','').val(0);
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

    var pusher = new Pusher('b18a8b47f86b06965176', {
        cluster: 'ap1'
    });

    var channel = pusher.subscribe('payment-channel');
    channel.bind('payment-event', function(data) {
        countNotification();
        orderNotification(data);
    });

    // // Lắng nghe xóa đơn hàng từ thiết bị khác
    // var delete_order_listen = pusher.subscribe('delete_order_channel');
    // delete_order_listen.bind('delete_order_event',function (order_id){
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });
    //     $.ajax({
    //         url: '/admin/delete_order_listen',
    //         order_id: order_id,
    //         dataType: "JSON",
    //         method: "GET",
    //         success: function(data) {
    //             console.log(data);
    //             toastr.success(data)
    //         },
    //         error: function(xhr, ajaxOptions, thrownError) {
    //             // alert(xhr.status);
    //             // alert(thrownError);
    //         }
    //     });
    // });
}

function countNotification(){
    let current_notification = $('.chuong-notification').text();
    let future_notification = parseInt(current_notification)+1;
    $('.chuong-notification').text(future_notification);
}

function orderNotification(data){
    console.log(data);
    toastr.success(data.name,"1 Đơn hàng mới cần xử lý")
    // update order_notifications
    let current_order = $('.order_notifications').text();
    let future_order = parseInt(current_order)+1;
    $('.order_notifications').text(future_order);
}

function themthuoctinh(){
    $('#themthuoctinh').append('\
		<div class="form-group col-md-4">\
			<div class="w_box3">\
                <div id="swatch" class="mt-1">\
                    <label class="d-block" for="color">Color:</label>\
                    <input type="color" id="color" name="color[]" class="form-control form-control-color" value="#FF0000">\
                </div>\
                <div id="swatch" class="mt-1">\
                    <label class="d-block" for="size">Size:</label>\
                    <input type="size" id="size" name="size[]" placeholder="XL">\
                </div>\
				<div id="swatch" class="d-flex justify-content-between align-item-center mt-1">\
					<label class="d-block" for="stock">Tồn kho:</label>\
					<input type="number" name="stock[]" class="form-control w-75 " placeholder="Tồn kho" min="1"  value="1" title="Tồn kho">\
				</div>\
			</div>\
		</div>');
}

function xoathuoctinh(){
    if($('.thuoctinh-delete-btn').length){
        $('.thuoctinh-delete-btn').click(function () {
            let product_id = $(this).data('product_id');
            let color = $(this).data('color');
            let size = $(this).data('size');
            let stock = $(this).data('stock');

            if(confirm("Bạn có muốn xóa?")){
                $(this).parents('.thuoctinh-box').remove();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/admin/product/delete-thuoctinh',
                    data: {
                        product_id : product_id,
                        color : color,
                        size : size,
                        stock : stock,
                    },
                    method: "POST",
                    success: function(result) {
                        if(result == 1){
                            toastr.success('Xóa thành công thuộc tính')
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        // alert(xhr.status);
                        // alert(thrownError);
                    }
                });
            }

        });
    }
}

$(document).ready(function() {
    xoathuoctinh();
    changeTitle();
    checkPrice();
    checAll();
    realtimeNotification();
});
