function progressBar(percent, $element) {
    if (!$element.hasClass('rendered')){
        var progressBarWidth = percent * $element.width() / 100;
        $element.addClass('rendered');
        $element.find('div').animate({ width: progressBarWidth }, 500).html('<div class="progress-num">' + percent + "%</div>");
    }
}