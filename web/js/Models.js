function formatString(s,args)
{
    for (var i = 0; i < args.length; i++) {
        var reg = new RegExp("\\{" + i + "\\}","gm");
        s = s.replace(reg, args[i]);
    }
    return s;
}
var chatItem = `<li class="inline-items js-chat-open">
                    <div class="author-thumb">
                        <img id="{0}" alt="author" src="{1}" class="avatar">
                        <span class="icon-status online"></span>
                    </div>
                </li>`;
var messageItem = `<span class="chat-message-item">{0}</span>`;
var messageModel = `<li>
                        <div class="author-thumb">
                            <img src="{0}" alt="author" class="mCS_img_loaded">
                        </div>
                        <div class="notification-event">
                            {1}
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
                        </div>
			        </li>`;
var searchResult = `<ul class="notification-list friend-requests">
                            <li>
                                <div class="author-thumb">
                                    <img src="{0}" alt="author">
                                </div>
                                <div class="notification-event">
                                    <a href="{1}" class="h6 notification-friend">{2}</a>
                                    <span class="chat-message-item">4 Friends in Common</span>
                                </div>
                                <span class="notification-icon">
                                    <a href="#" class="accept-request">
                                        <span class="icon-add">
                                            <svg class="olymp-happy-face-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="{3}"></use></svg>
                                        </span>
                                        Demande de Communication
                                    </a>
						        </span>
                                <div class="more">
                                    <svg class="olymp-three-dots-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="{4}"></use></svg>
                                    <svg class="olymp-little-delete"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="{5}"></use></svg>
                                </div>
                            </li>
                        </ul>`;

