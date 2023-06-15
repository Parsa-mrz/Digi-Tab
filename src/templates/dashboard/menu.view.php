<div class="wrap woo-order-list">
    <h1>تنظیمات افزونه لیست سفارشات</h1>
    <?= $message ?>
    <div class="custom-tabs">
        <button class="tab-link active" onclick="openTab(event, 'Tab1')">تنظیمات</button>
        <button class="tab-link" onclick="openTab(event, 'Tab2')">کد کوتاه</button>
        <button class="tab-link" onclick="openTab(event, 'Tab3')">درباره افزونه</button>
    </div>
    <div id="Tab1" class="tab-content" style="display: block;">
        <h3>تنظیمات افزونه</h3>
        <form method="POST">
            <div class="item">
                <input type="checkbox" <?php echo $processing == 1 ? 'checked' : ''; ?> name='processing'>
                <label>فعال سازی تب سفارشات جاری</label>
            </div>
            <div class="item">
                <input type="checkbox" <?php echo $completed == 1 ? 'checked' : ''; ?> name='completed'>
                <label>فعال سازی تب سفارشات تکمیل شده</label>
            </div>
            <div class="item">
                <input type="checkbox" <?php echo $refunded == 1 ? 'checked' : ''; ?> name='refunded'>
                <label>فعال سازی تب سفارشات مرجوع شده</label>
            </div>
            <div class="item">
                <input type="checkbox" <?php echo $failed == 1 ? 'checked' : ''; ?> name='failed'>
                <label>فعال سازی تب سفارشات ناموفق</label>
            </div>
            <div class="item">
                <input type="checkbox" <?php echo $onhold == 1 ? 'checked' : ''; ?> name='on-hold'>
                <label>فعال سازی تب سفارشات در انتظار پرداخت</label>
            </div>
            <div class="item">
                <input type="checkbox" <?php echo $cancelled == 1 ? 'checked' : ''; ?> name='cancelled'>
                <label>فعال سازی تب سفارشات لغو شده </label>
            </div>
            <div class="item">
                <input type="checkbox" <?php echo $pending == 1 ? 'checked' : ''; ?> name='pending'>
                <label>فعال سازی تب سفارشات در انتظار بررسی </label>
            </div>
            <div class="item">
                <input type="submit" name="submit-form" value="ذخیره تنظیمات">
            </div>
        </form>
    </div>

    <div id="Tab2" class="tab-content">
        <h3>کد های کوتاه</h3>
        <table class='order-list-table'>
            <thead>
                <tr>
                    <th>توضیحات</th>
                    <th>کد کوتاه فرم</th>
                    <th>کد کوتاه تعداد</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        سفارشات تکمیل شده
                    </td>
                    <td>
                        [complete-view]
                    </td>
                    <td>
                        [complete-count]
                    </td>
                </tr>

                <tr>
                    <td>
                        سفارشات مرجوع شده
                    </td>
                    <td>
                        [refund-view]
                    </td>
                    <td>
                        [refund-count]
                    </td>
                </tr>

                <tr>
                    <td>
                        سفارشات لغو شده
                    </td>
                    <td>
                        [failed-view]
                    </td>
                    <td>
                        [failed-count]
                    </td>
                </tr>

                <tr>
                    <td>
                        سفارشات جاری
                    </td>
                    <td>
                        [processing-view]
                    </td>
                    <td>
                        [processing-count]
                    </td>
                </tr>
                <tr>
                    <td>
                        سفارشات در انتظار پرداخت
                    </td>
                    <td>
                        [onhold-view]
                    </td>
                    <td>
                        [onhold-count]
                    </td>
                </tr>
                <tr>
                    <td>
                        سفارشات در انتظار بررسی
                    </td>
                    <td>
                        [pending-view]
                    </td>
                    <td>
                        [pending-count]
                    </td>
                </tr>
                <tr>
                    <td>
                        سفارشات ناموفق
                    </td>
                    <td>
                        [failed-view]
                    </td>
                    <td>
                        [failed-count]
                    </td>
                </tr>
            </tbody>
        </table>
        <h3>توضیحات</h3>
        <div class='order-list-desc'>
            <ol>
                <li>
                    <p>
                        کد کوتاه تعداد برای نمایش تعداد سفارشات موجود در هر وضعیت ایجاد شده و قابل استفاده در تمامی بخش های قالب میباشد
                    </p>
                </li>
                <li>
                    <p>
                        کد کوتاه فرم برای نمایش فرم وضعیت های مختلف سفارش ایجاد شده و قابل استفاده در تمامی بخش های قالب میباشد
                    </p>
                </li>
            </ol>
        </div>
    </div>

    <div id="Tab3" class="tab-content">
    <h3>درباره افزونه </h3>        
    <p>این افزونه بخش سفارشات دیجیکالا را در سایت وردپرس شما به نمایش می اورد و تمامی وضعیت های سفارش را برای مشتریان شما نمایش میدهد</p>
    <p>با فعال سازی این افزونه، بخش سفارشات در داشبورد کاربری ووکامرس به ظاهر دیجیکالا تغییر می کند.</p>
    <p>این افزونه توسط تیم اسکانو برنامه نویسی شده است و درصورتی که نیاز به تغییر اختصاصی در افزونه و یا اضافه کردن وضعیت های دیگر میباشد در تیکت اعلام فرمایید</p>
    </div>




</div>