
<div class="contact-strip bg-mid-gray">Your Attempted Questions</div>
<div class="space"></div>
<?php
if (! empty ( $_SESSION ['answers'] )) {
    foreach ( $arrData as $key => $value ) {
        if (! empty ( $value )) {
            $index = array_search ( $arrData ["$key"] ['id'], $_SESSION ['review'] );
            if ($index === false) {
                $review = "submmit_button_generic";
                $astrix = "";
            } else {
                $review = "submmit_button_generic bg-fg-button-color";
                $astrix = "*";
            }
            echo "<a href='" . SITE_PATH . "test/navigateQuestion/?question=" . $arrData ["$key"] ['id'] . "' class='$review'>";
            echo "$astrix" . $arrData ["$key"] ['question'] . "</a>" . "<div class=space></div><div class=space></div>";
            echo "<label>Your Answer : " . $arrData ["$key"] ['option'] . "</label>" . "<br/>" . "<div class=space></div><div class=space></div>";
        }
    }
} else {
    echo "NO Question Answered";
}
