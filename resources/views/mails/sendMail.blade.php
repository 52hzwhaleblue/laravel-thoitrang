<table>
    <tbody>
        <tr>
            <td>
                <h1 style="font-size:14px;font-weight:bold;color:#444;padding:0 0 5px 0;margin:0">
                    Chào <b> {{$fullname}} </b>. Đơn hàng của bạn đã đặt thành công!</h1>
                <p
                    style="margin:4px 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">
                    Chúng tôi đang chuẩn bị hàng để bàn giao cho đơn vị vận chuyển hàng
                </p>
                <h3
                    style="font-size:13px;font-weight:bold;color:#02acea;text-transform:uppercase;margin:20px 0 0 0;border-bottom:1px solid #ddd">
                    MÃ ĐƠN HÀNG: {{$code_order}}<br>Ngày đặt: {{$time_now}}
                </h3>
            </td>
        </tr>
        <tr>
        </tr>
        <tr>
            <td style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">
                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <thead>
                        <tr>
                            <th style="padding:6px 9px 0px 9px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;font-weight:bold"
                                width="50%" align="left">
                                Thông tin khách hàng</th>
                            <th style="padding:6px 9px 0px 9px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;font-weight:bold"
                                width="50%" align="left">
                                Địa chỉ giao hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="padding:3px 9px 9px 9px;border-top:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal"
                                valign="top">
                                <span style="text-transform:capitalize">Họ và tên: {{$fullname}}</span><br>
                                <span style="text-transform:capitalize">Email: {{$email}}</span><br>
                                <span style="text-transform:capitalize">Số điện thoại: {{$phone}}</span><br>
                                <span style="text-transform:capitalize">Phương thức thanh toán: {{$payment_method}}</span><br>
                            </td>
                            <td style="padding:3px 9px 9px 9px;border-top:0;border-left:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal"
                                valign="top"> {{$address}}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table
                    style="width:100%;border-collapse:collapse;border-spacing:2px;background:#f5f5f5;display:table;box-sizing:border-box;border:0;border-color:grey">
                    <thead style="display:table-header-group;vertical-align:middle;border-color:inherit">
                        <tr>
                            <th
                                style="text-align:left;background-color:#02acea; padding:6px 9px;color:#fff;text-transform:uppercase;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">
                                Tên sản phẩm</th>
                            <th
                                style="text-align:left;background-color:#02acea; padding:6px 9px;color:#fff;text-transform:uppercase;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">
                                Giá</th>
                            <th
                                style="text-align:left;background-color:#02acea; padding:6px 9px;color:#fff;text-transform:uppercase;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">
                                Số lượng</th>
                            <th
                                style="text-align:left;background-color:#02acea; padding:6px 9px;color:#fff;text-transform:uppercase;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">
                                Thành tiền</th>

                        </tr>
                    </thead>
                    <tbody
                        style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;background-color:rgb(238,238,238);display:table-row-group;vertical-align:middle;border-color:inherit">
                        @foreach ($dataCart as $k => $v )
                        <tr>
                            <th style="padding:3px 9px">
                                <p> {{$v->name}} </p>
                                <p class="d-flex align-items-center">
                                    <span class="mr-2"> Size: {{$v->options->size}} </span>
                                    <span> Color: <input style=" width: 30px; height: 20px; border: 0;outline: 0; background: unset;
                                " type="color" value="{{$v->options->color}}">  </span>
                                </p>
                            </th>
                            <th style="padding:3px 9px">
                                {{number_format($v->options->sale_price)}}vnđ
                            </th>
                            <th style="padding:3px 9px">
                                <p>{{$v->qty}}</p>
                            </th>
                            <th style="padding:3px 9px">
                                {{number_format($v->subtotal)}}vnđ
                            </th>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="3"
                                style="text-align:left;background-color:rgb(238,238,238);padding:6px 9px;color:rgb(0,0,0);text-transform:uppercase;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">
                                <strong>Tổng thanh toán:</strong>
                            </td>
                            <td colspan="1" style="padding:3px 9px">
                                <span style="color:red">{{number_format($total, 0, ",", ".")}}đ</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <br>
                <p
                    style="margin:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">
                    Quý khách vui lòng giữ lại hóa đơn, hộp sản phẩm và
                    phiếu bảo hành
                    (nếu có) để đổi trả hàng hoặc bảo hành khi cần
                    thiết.
                </p>
                <p
                    style="margin:10px 0 0 0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">
                    Liên hệ Hotline: <strong style="color:#099202">0987.654.321</strong>(8-21h cả T7,CN).
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <br>
                <p
                    style="font-family:Arial,Helvetica,sans-serif;font-size:12px;margin:0;padding:0;line-height:18px;color:#444;font-weight:bold">
                    <span>CỬA HÀNG JEAN NAM C665</span> cảm ơn quý khách đã đặt hàng, chúng tôi sẽ không
                    ngừng nổ lực để phục vụ quý khách tốt hơn!<br>
                </p>
            </td>
        </tr>
    </tbody>
</table>
