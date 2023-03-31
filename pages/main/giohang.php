<?php
if (isset($_SESSION['id_khachhang'])) {
?>
  <div class="container">
    <!-- Responsive Arrow Progress Bar -->
    <div class="arrow-steps clearfix">
      <div class="step current"> <span> <a href="index.php?quanly=giohang">Giỏ hàng</a></span> </div>
      <div class="step"> <span><a href="index.php?quanly=vanchuyen">Vận chuyển</a></span> </div>
      <div class="step"> <span><a href="index.php?quanly=thongtinthanhtoan">Thanh toán</a><span> </div>
    </div>

  </div>
<?php
}
?>
<div class="container">
  <h4 class="mt-4">Giỏ hàng
    <?php
    if (isset($_SESSION['dangky'])) {
      echo 'của tài khoản: ' . '<span style="color:red">' . $_SESSION['dangky'] . '</span>';
    }
    ?>
  </h4>
  <?php
  if (isset($_SESSION['cart'])) {
  }
  ?>
  <table style="width:100%;text-align: center;" border="1" class="mt-2 table table-bordered">
    <thead class="thead-light">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Mã sp</th>
        <th scope="col">Tên sản phẩm</th>
        <th scope="col">Hình ảnh</th>
        <th scope="col">Số lượng</th>
        <th scope="col">Giá sản phẩm</th>
        <th scope="col">Thành tiền</th>
        <th scope="col">Quản lý</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (isset($_SESSION['cart'])) {
        $i = 0;
        $tongtien = 0;
        foreach ($_SESSION['cart'] as $cart_item) {
          $thanhtien = $cart_item['soluong'] * $cart_item['giasp'];
          $tongtien += $thanhtien;
          $i++;
      ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $cart_item['masp']; ?></td>
            <td><?php echo $cart_item['tensanpham']; ?></td>
            <td><img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']; ?>" width="150px"></td>
            <td>
              <a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>"><i class="fa fa-minus fa-style" aria-hidden="true"></i></a>
              <?php echo $cart_item['soluong']; ?>
              <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>"><i class="fa fa-plus fa-style" aria-hidden="true"></i></a>

            </td>
            <td><?php echo number_format($cart_item['giasp'], 0, ',', '.') . 'vnđ'; ?></td>
            <td><?php echo number_format($thanhtien, 0, ',', '.') . 'vnđ' ?></td>
            <td><a href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>">Xoá</a></td>
          </tr>

        <?php
        }
        ?>
        <tr>
          <td colspan="8">
            <p style="float: left;" class="font-weight-bold">Tổng tiền: <?php echo number_format($tongtien, 0, ',', '.') . 'vnđ' ?></p><br />

            <p style="float: right;"><a href="pages/main/themgiohang.php?xoatatca=1">Xoá tất cả</a></p>
            <div style="clear: both;"></div>
            <?php
            if (isset($_SESSION['dangky'])) {
            ?>
              <p><a href="index.php?quanly=vanchuyen">Hình thức vận chuyển</a></p>
            <?php
            } else {
            ?>
              <p><a href="index.php?quanly=dangky">Đăng kí đặt hàng</a></p>
            <?php
            }
            ?>




          </td>


        </tr>
    </tbody>
  <?php
      } else {
  ?>
    <tr>
      <td colspan="8">
        <p>Hiện tại giỏ hàng trống</p>
      </td>

    </tr>
  <?php
      }
  ?>

  </table>
</div>