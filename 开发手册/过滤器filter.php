<?php
/**
 * 过滤器分两种：
 * 1.过滤器方法。//方法体在当前的控制器中，需要执行过滤器的链run()
 * 2.过滤器类。//只是对action前后的一个补充
 * 
 * CFilter对象的init()方法在所有过滤器之前执行，按照指定的顺序
 * 
 * CController已经集成了多个常用过滤器
 * filterPostOnly//仅post提交
 * filterAjaxOnly//权ajax提交
 * filterAccessControl//action的授权过滤器
 * 其中权限过滤器，由一个专用的类实现$filter=new CAccessControlFilter;
 * 其它的是普通方法过滤器
 * 
 * 
 */
