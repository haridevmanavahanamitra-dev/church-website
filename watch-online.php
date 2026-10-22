<?php
$channelId = 'UCsl23MQfuBnrMZhKLCL4KXQ';
$uploadsPlaylistId = 'UU' . substr($channelId, 2);
$channelUrl = 'https://www.youtube.com/@adongospelchurchministry';
$channelVideosUrl = $channelUrl . '/videos';
$feedUrl = 'https://www.youtube.com/feeds/videos.xml?channel_id=' . rawurlencode($channelId);
$feedContext = stream_context_create(array(
    'http' => array(
        'timeout' => 8,
        'user_agent' => 'Adon Gospel Church Ministry Website/1.0'
    )
));
$feedXml = @file_get_contents($feedUrl, false, $feedContext);
$videos = array();
$feedError = false;

if ($feedXml === false) {
    $feedError = true;
} else {
    $previousLibxmlSetting = libxml_use_internal_errors(true);
    $feed = simplexml_load_string($feedXml, 'SimpleXMLElement', LIBXML_NONET);
    libxml_clear_errors();
    libxml_use_internal_errors($previousLibxmlSetting);

    if ($feed === false) {
        $feedError = true;
    } else {
        $atomNamespace = 'http://www.w3.org/2005/Atom';
        $youtubeNamespace = 'http://www.youtube.com/xml/schemas/2015';

        foreach ($feed->children($atomNamespace)->entry as $entry) {
            $videoId = (string) $entry->children($youtubeNamespace)->videoId;
            if (!preg_match('/^[A-Za-z0-9_-]{11}$/', $videoId)) {
                continue;
            }

            $videos[] = array(
                'id' => $videoId,
                'title' => (string) $entry->children($atomNamespace)->title,
                'published' => (string) $entry->children($atomNamespace)->published
            );
        }
    }
}

$latestVideoId = isset($videos[0]) ? $videos[0]['id'] : '';
$requestedVideoId = isset($_GET['v']) && preg_match('/^[A-Za-z0-9_-]{11}$/', $_GET['v'])
    ? $_GET['v']
    : null;
$selectedVideoId = $requestedVideoId !== null ? $requestedVideoId : $latestVideoId;
$selectedVideoTitle = 'Latest video from Adon Gospel Church Ministry';

foreach ($videos as $video) {
    if ($video['id'] === $selectedVideoId) {
        $selectedVideoTitle = $video['title'];
        break;
    }
}

$playerUrl = $requestedVideoId === null
    ? 'https://www.youtube-nocookie.com/embed/live_stream?channel=' . rawurlencode($channelId) . '&autoplay=1&playsinline=1&rel=0&enablejsapi=1'
    : 'https://www.youtube-nocookie.com/embed/' . rawurlencode($selectedVideoId) . '?autoplay=1&playsinline=1&rel=0&enablejsapi=1';

$pageTitle = 'Watch Online | Adon Gospel Church Ministry';
include 'inc/header.php';
?>

<style>
    .watch-page {
        min-height: 70vh;
        padding: 64px 0 88px;
        background: #f7f8fb;
        color: #0f1b3d;
    }
    .watch-container {
        width: min(1160px, calc(100% - 48px));
        margin: 0 auto;
        min-width: 0;
    }
    .watch-heading { margin-bottom: 28px; }
    .watch-eyebrow {
        display: inline-block;
        margin-bottom: 10px;
        color: #1749c9;
        font-size: .76rem;
        font-weight: 700;
        letter-spacing: .16em;
        text-transform: uppercase;
    }
    .watch-heading h1 {
        margin: 0;
        color: #0f1b3d;
        font-size: clamp(2rem, 4vw, 3rem);
        font-weight: 600;
        letter-spacing: -.035em;
    }
    .watch-heading p { margin: 10px 0 0; color: #65736c; line-height: 1.7; }
    .watch-feature {
        overflow: hidden;
        border: 1px solid #e1e5ee;
        border-radius: 12px;
        background: #fff;
        box-shadow: 0 16px 42px rgba(15, 27, 61, .08);
    }
    .watch-player {
        display: block;
        width: 100%;
        aspect-ratio: 16 / 9;
        border: 0;
        background: #000;
    }
    .watch-feature-details { padding: 22px 26px 25px; }
    .watch-feature-details h2 { overflow-wrap: anywhere; }
    .watch-feature-details h2 { margin: 0; font-size: clamp(1.15rem, 2vw, 1.55rem); line-height: 1.4; }
    .watch-feature-details p { margin: 8px 0 0; color: #65736c; font-size: .9rem; }
    .watch-list-heading {
        display: flex;
        align-items: end;
        justify-content: space-between;
        gap: 20px;
        margin: 52px 0 20px;
    }
    .watch-list-heading h2 { margin: 0; font-size: clamp(1.5rem, 3vw, 2rem); }
    .watch-list-heading a { color: #1749c9; font-size: .9rem; font-weight: 700; text-decoration: none; }
    .watch-list-heading a:hover { text-decoration: underline; }
    .watch-youtube-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 44px;
        height: 44px;
        border-radius: 8px;
        background: #e62117;
        color: #fff !important;
        text-decoration: none !important;
    }
    .watch-youtube-button:hover, .watch-youtube-button:focus-visible { background: #c91d15; }
    .watch-youtube-button i { font-size: 1.4rem; }
    .watch-sections {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin: 28px 0 0;
    }
    .watch-section-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 9px 13px;
        border: 1px solid #d9deea;
        border-radius: 7px;
        background: #fff;
        color: #26334d;
        font-size: .88rem;
        font-weight: 600;
        text-decoration: none;
    }
    .watch-section-link:hover, .watch-section-link:focus-visible { border-color: #1749c9; color: #1749c9; }
    .watch-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 22px;
    }
    .watch-card {
        overflow: hidden;
        border: 1px solid #e1e5ee;
        border-radius: 9px;
        background: #fff;
        color: inherit;
        text-decoration: none;
        transition: transform .2s ease, box-shadow .2s ease;
    }
    .watch-card:hover, .watch-card:focus-visible {
        transform: translateY(-3px);
        box-shadow: 0 14px 30px rgba(15, 27, 61, .12);
    }
    .watch-thumbnail {
        display: block;
        width: 100%;
        aspect-ratio: 16 / 9;
        object-fit: cover;
        background: #dce2ee;
    }
    .watch-card-copy { padding: 16px 18px 19px; }
    .watch-card-copy h3 {
        display: -webkit-box;
        overflow: hidden;
        margin: 0;
        color: #0f1b3d;
        font-size: 1rem;
        font-weight: 600;
        line-height: 1.5;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
    }
    .watch-card-copy time { display: block; margin-top: 9px; color: #65736c; font-size: .8rem; }
    .watch-feed-error, .watch-empty {
        padding: 20px 22px;
        border: 1px solid #e1e5ee;
        border-radius: 8px;
        background: #fff;
        color: #65736c;
        line-height: 1.7;
    }
    .watch-feed-error a { color: #1749c9; font-weight: 700; }
    @media (max-width: 760px) {
        .watch-page { padding: 48px 0 68px; }
        .watch-container { width: min(100% - 36px, 620px); }
        .watch-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 15px; }
        .watch-list-heading { align-items: center; gap: 12px; margin-top: 40px; }
        .watch-list-heading h2 { min-width: 0; font-size: clamp(1.25rem, 5vw, 1.7rem); }
        .watch-sections { gap: 8px; }
    }
    @media (max-width: 520px) {
        .watch-container { width: calc(100% - 32px); }
        .watch-grid { grid-template-columns: 1fr; }
        .watch-feature-details { padding: 16px; }
        .watch-list-heading { margin: 34px 0 16px; }
        .watch-youtube-button { width: 42px; height: 42px; flex: 0 0 auto; }
        .watch-sections { gap: 8px; margin-top: 20px; }
        .watch-section-link { flex: 1 1 calc(50% - 8px); justify-content: center; padding: 9px 7px; font-size: .78rem; }
        .watch-card-copy { padding: 14px 15px 16px; }
        .watch-feed-error, .watch-empty { padding: 16px; overflow-wrap: anywhere; }
    }
    @media (max-width: 360px) {
        .watch-eyebrow { font-size: .68rem; letter-spacing: .12em; }
        .watch-heading h1 { font-size: 1.8rem; }
        .watch-section-link { flex-basis: 100%; }
    }
    @media (prefers-reduced-motion: reduce) {
        .watch-card { transition: none; }
    }
</style>

<section class="watch-page" aria-labelledby="watch-page-title">
    <div class="watch-container">
        <header class="watch-heading">
            <span class="watch-eyebrow">Worship with us online</span>
            <h1 id="watch-page-title">Adon Gospel Church Ministry</h1>
            <p>Watch our live stream when we are broadcasting, or catch up with the latest service and channel uploads.</p>
        </header>

        <article class="watch-feature" aria-labelledby="watch-video-title">
            <iframe
                id="watch-player"
                class="watch-player"
                data-video-id="<?php echo htmlspecialchars($selectedVideoId, ENT_QUOTES, 'UTF-8'); ?>"
                data-playlist-id="<?php echo htmlspecialchars($uploadsPlaylistId, ENT_QUOTES, 'UTF-8'); ?>"
                title="<?php echo htmlspecialchars($selectedVideoTitle, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>"
                src="<?php echo htmlspecialchars($playerUrl, ENT_QUOTES, 'UTF-8'); ?>"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin"
                allowfullscreen>
            </iframe>
            <div class="watch-feature-details">
                <h2 id="watch-video-title"><?php echo htmlspecialchars($selectedVideoTitle, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></h2>
                <p id="watch-player-caption"><?php echo $requestedVideoId === null ? 'Checking for a live broadcast; the latest video will play when we are offline.' : 'Use the player controls to adjust the volume.'; ?></p>
            </div>
        </article>

        <nav class="watch-sections" aria-label="Adon Gospel Church Ministry YouTube sections">
            <a class="watch-section-link" href="<?php echo htmlspecialchars($channelVideosUrl, ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener noreferrer"><i class="fab fa-youtube" aria-hidden="true"></i> Videos</a>
            <a class="watch-section-link" href="<?php echo htmlspecialchars($channelUrl . '/shorts', ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener noreferrer"><i class="fas fa-mobile-screen-button" aria-hidden="true"></i> Shorts</a>
            <a class="watch-section-link" href="<?php echo htmlspecialchars($channelUrl . '/streams', ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener noreferrer"><i class="fas fa-tower-broadcast" aria-hidden="true"></i> Live &amp; past streams</a>
            <a class="watch-section-link" href="<?php echo htmlspecialchars($channelUrl . '/playlists', ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener noreferrer"><i class="fas fa-list" aria-hidden="true"></i> Playlists</a>
            <a class="watch-section-link" href="<?php echo htmlspecialchars($channelUrl . '/community', ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener noreferrer"><i class="fas fa-comments" aria-hidden="true"></i> Posts</a>
        </nav>

        <div class="watch-list-heading">
            <h2>More from our channel</h2>
            <a class="watch-youtube-button" href="<?php echo htmlspecialchars($channelVideosUrl, ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener noreferrer" aria-label="Browse all videos on YouTube">
                <i class="fab fa-youtube" aria-hidden="true"></i>
            </a>
        </div>

        <?php if ($feedError): ?>
            <p class="watch-feed-error">
                We couldn’t load the channel’s recent videos right now.
                <a href="<?php echo htmlspecialchars($channelVideosUrl, ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener noreferrer">Browse the channel on YouTube</a>.
            </p>
        <?php else: ?>
            <?php
            $otherVideos = array_filter($videos, function ($video) use ($selectedVideoId) {
                return $video['id'] !== $selectedVideoId;
            });
            ?>
            <?php if (count($otherVideos) > 0): ?>
                <div class="watch-grid">
                    <?php foreach ($otherVideos as $video): ?>
                        <a
                            class="watch-card"
                            href="watch-online.php?v=<?php echo rawurlencode($video['id']); ?>"
                            target="_blank"
                            rel="noopener">
                            <img
                                class="watch-thumbnail"
                                src="https://i.ytimg.com/vi/<?php echo htmlspecialchars($video['id'], ENT_QUOTES, 'UTF-8'); ?>/hqdefault.jpg"
                                alt=""
                                loading="lazy">
                            <div class="watch-card-copy">
                                <h3><?php echo htmlspecialchars($video['title'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></h3>
                                <?php if ($video['published'] !== ''): ?>
                                    <time datetime="<?php echo htmlspecialchars($video['published'], ENT_QUOTES, 'UTF-8'); ?>">
                                        <?php echo htmlspecialchars(date('F j, Y', strtotime($video['published'])), ENT_QUOTES, 'UTF-8'); ?>
                                    </time>
                                <?php endif; ?>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="watch-empty">No other recent videos are available yet. Please check back soon.</p>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</section>

<?php if ($requestedVideoId === null): ?>
<script>
    (function () {
        var playerElement = document.getElementById('watch-player');
        var fallbackVideoId = playerElement.dataset.videoId;
        var uploadsPlaylistId = playerElement.dataset.playlistId;
        var latestVideoTitle = <?php echo json_encode($selectedVideoTitle, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT); ?>;
        var titleElement = document.getElementById('watch-video-title');
        var captionElement = document.getElementById('watch-player-caption');
        var fallbackStarted = false;

        window.onYouTubeIframeAPIReady = function () {
            new YT.Player(playerElement, {
                events: {
                    onReady: function (event) {
                        var videoTitle = event.target.getVideoData().title;
                        if (videoTitle) {
                            titleElement.textContent = videoTitle;
                        }
                    },
                    onError: function (event) {
                        if (fallbackStarted) {
                            return;
                        }

                        fallbackStarted = true;
                        titleElement.textContent = latestVideoTitle;
                        captionElement.textContent = 'No live broadcast is available right now. Playing our latest video.';
                        if (fallbackVideoId) {
                            event.target.loadVideoById(fallbackVideoId);
                        } else {
                            event.target.loadPlaylist({list: uploadsPlaylistId});
                        }
                    },
                    onStateChange: function (event) {
                        if (event.data === YT.PlayerState.PLAYING) {
                            var videoTitle = event.target.getVideoData().title;
                            if (videoTitle) {
                                titleElement.textContent = videoTitle;
                            }
                        }
                    }
                }
            });
        };

        var apiScript = document.createElement('script');
        apiScript.src = 'https://www.youtube.com/iframe_api';
        document.head.appendChild(apiScript);
    }());
</script>
<?php endif; ?>

<?php include 'inc/footer.php'; ?>
