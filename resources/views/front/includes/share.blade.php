<div class="share">
    <span>Share:</span>
    <ul>
        <li class="li active">
            <a class="button fb fb-share" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}">FACEBOOK</a>
        </li>
        <li class="li">
            <a class="button tw twitPop" href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}">TWITTER</a>
        </li>
        <li class="li">
            <a class="button pr" href="javascript:(0)">PRINT</a>
        </li>
        <li class="li">
            <a class="button cl" href="javascript:(0)" onclick="copyToClipboard('{!! request()->fullUrl() !!}')">COPY LINK</a>
        </li>
    </ul>
</div>
