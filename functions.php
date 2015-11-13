<?php

function themeConfig($form) {
    $billboardImage = new Typecho_Widget_Helper_Form_Element_Text('billboardImage', NULL, NULL, _t('首页图片'), _t('在这里填入一个图片URL地址, 作为首页 Billboard 图片，留空则显示默认图片'));
    $form->addInput($billboardImage);
    
    $slogan = new Typecho_Widget_Helper_Form_Element_Text('slogan', NULL, NULL, _t('首页图片标语文字'), _t('在这里输入首页标语'));
    $form->addInput($slogan);
    
    $sloganColor = new Typecho_Widget_Helper_Form_Element_Text('sloganColor', NULL, NULL, _t('首页图片标语文字颜色'), _t('在这里设置首页标语颜色'));
    $form->addInput($sloganColor);

    $siteIcon = new Typecho_Widget_Helper_Form_Element_Text('siteIcon', NULL, NULL, _t('标题栏和书签栏Icon'), _t('在这里填入一个图片URL地址, 作为标题栏和书签栏Icon, 默认不显示'));
    $form->addInput($siteIcon);

    $miibeian = new Typecho_Widget_Helper_Form_Element_Text('miibeian', NULL, _t(''), _t('备案号'), _t('在这里填入天朝备案号，不显示则留空'));
    $form->addInput($miibeian);

    $disqusShortName = new Typecho_Widget_Helper_Form_Element_Text('disqusShortName', NULL, _t(''), _t('Disqus Shortname'), _t('在这里填入 Disqus Shortname，使用内置评论系统则留空'));
    $form->addInput($disqusShortName);

    $googleAnalyticsTrackingId = new Typecho_Widget_Helper_Form_Element_Text('googleAnalyticsTrackingId', NULL, _t(''), _t('Google Analytics Tracking ID'), _t('在这里填入 Google Analytics Tracking ID，不使用 Google Analytics 则留空'));
    $form->addInput($googleAnalyticsTrackingId);

    $misc = new Typecho_Widget_Helper_Form_Element_Checkbox('misc', array(
        'ShowLogin' => _t('前台显示登录入口'),
        'ShowLoadTime' => _t('页脚显示加载耗时')
        ),
    array('ShowLogin'), _t('杂项'));
    $form->addInput($misc->multiMode());
}

function timer_start() {
    global $timestart;
    $mtime = explode( ' ', microtime() );
    $timestart = $mtime[1] + $mtime[0];
    return true;
}
timer_start();
 
function timer_stop( $display = 0, $precision = 3 ) {
    global $timestart, $timeend;
    $mtime = explode( ' ', microtime() );
    $timeend = $mtime[1] + $mtime[0];
    $timetotal = $timeend - $timestart;
    $r = number_format( $timetotal, $precision );
    if ( $display )
    echo $r;
    return $r;
}
?>