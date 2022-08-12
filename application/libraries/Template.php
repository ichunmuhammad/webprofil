<?php
class Template {
    //ci instance
    private $CI;
    //template Data
    public $template_data = array();

    public function __construct() {
        $this->CI = &get_instance();
    }

    public function set($content_area, $value) {
        $this->template_data[$content_area] = $value;
    }

    public function load($template = '', $view = '', $view_data = array(), $return = false) {
        $this->set('content', $this->CI->load->view($view, $view_data, true));
        $this->CI->load->view('template/' . $template, $this->template_data);
    }

    public function loadfrontend($template = '', $view = '', $view_data = array(), $return = false) {
        $this->set('content', $this->CI->load->view('frontend/'.$template.'/'.$view, $view_data, true));
        $this->CI->load->view('template/' . $template, $this->template_data);
    }

    public function tgl_indo($tanggal, $isJam = true, $short = false) {
        $tanggal = date_create($tanggal);
        if ($short) {
            $bulan = array(
                1 => 'Jan',
                'Feb',
                'Mar',
                'Apr',
                'Mei',
                'Jun',
                'Jul',
                'Agust',
                'Sept',
                'Okt',
                'Nov',
                'Des',
            );
        } else {
            $bulan = array(
                1 => 'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember',
            );
        }
        // $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        if ($isJam) {
            return date_format($tanggal, "d") . '/' . $bulan[(int) date_format($tanggal, "m")] . '/' . date_format($tanggal, "Y") . ' ' . date_format($tanggal, "H:i");
        }
        return date_format($tanggal, "d") . '/' . $bulan[(int) date_format($tanggal, "m")] . '/' . date_format($tanggal, "Y");
    }

    public function hanyajam($tanggal, $pendek = false) {
        $tanggal = date_create($tanggal);
        if ($pendek) {
            return date_format($tanggal, "H:i");
        }
        return date_format($tanggal, "H:i:s");
    }

    public function gethari($start_at = "")
    {
		if($start_at !== ""){
			switch($start_at){
				case "sunday":
					return ["sunday", "monday", "tuesday", "wednesday", "thursday", "friday", "saturday"];
				case "monday":
					return ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday"];
				case "tuesday":
					return ["tuesday", "wednesday", "thursday", "friday", "saturday", "sunday", "monday"];
				case "wednesday":
					return ["wednesday", "thursday", "friday", "saturday", "sunday", "monday", "tuesday"];
				case "thursday":
					return ["thursday", "friday", "saturday", "sunday", "monday", "tuesday", "wednesday"];
				case "friday":
					return ["friday", "saturday", "sunday", "monday", "tuesday", "wednesday", "thursday"];
				case "saturday":
					return ["saturday", "sunday", "monday", "tuesday", "wednesday", "thursday", "friday"];
			}
		}
        return ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday"];
    }

    public function NamaHari_IN($str) {
        $str = strtolower($str);
        switch ($str) {
        case 'sunday':
            return 'minggu';
        case 'monday':
            return 'senin';
        case 'tuesday':
            return 'selasa';
        case 'wednesday':
            return 'rabu';
        case 'thursday':
            return 'kamis';
        case 'friday':
            return 'jumat';
        case 'saturday':
            return 'sabtu';
        default:
            return false;
        }
    }

    public function slug($text) {
        // replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d]+~u', '_', $text);
        // trim
        $text = trim($text, '_');
        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // lowercase
        $text = strtolower($text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        if (empty($text)) {
            return 'n_a';
        }
        return $text;
    }

    public function getListIcons()
    {
        return ["fa-address-book", "fa-address-card", "fa-adjust", "fa-align-center", "fa-align-justify", "fa-align-left", "fa-align-right", "fa-allergies", "fa-ambulance", "fa-american-sign-language-interpreting", "fa-anchor", "fa-angle-double-down", "fa-angle-double-left", "fa-angle-double-right", "fa-angle-double-up", "fa-angle-down", "fa-angle-left", "fa-angle-right", "fa-angle-up", "fa-archive", "fa-arrow-alt-circle-down", "fa-arrow-alt-circle-left", "fa-arrow-alt-circle-right", "fa-arrow-alt-circle-up", "fa-arrow-circle-down", "fa-arrow-circle-left", "fa-arrow-circle-right", "fa-arrow-circle-up", "fa-arrow-down", "fa-arrow-left", "fa-arrow-right", "fa-arrow-up", "fa-arrows-alt", "fa-arrows-alt-h", "fa-arrows-alt-v", "fa-assistive-listening-systems", "fa-asterisk", "fa-at", "fa-backward", "fa-balance-scale", "fa-ban", "fa-band-aid", "fa-barcode", "fa-bars", "fa-baseball-ball", "fa-bath", "fa-battery-empty", "fa-battery-full", "fa-battery-half", "fa-battery-quarter", "fa-battery-three-quarters", "fa-bed", "fa-beer", "fa-bell", "fa-bell-slash", "fa-bicycle", "fa-binoculars", "fa-birthday-cake", "fa-blind", "fa-bold", "fa-bolt", "fa-bomb", "fa-book", "fa-bookmark", "fa-bowling-ball", "fa-box", "fa-box-open", "fa-boxes", "fa-braille", "fa-briefcase", "fa-bug", "fa-building", "fa-bullhorn", "fa-bullseye", "fa-burn", "fa-bus", "fa-calculator", "fa-calendar", "fa-calendar-alt", "fa-calendar-check", "fa-calendar-minus", "fa-calendar-plus", "fa-calendar-times", "fa-camera", "fa-camera-retro", "fa-capsules", "fa-car", "fa-caret-down", "fa-caret-left", "fa-caret-right", "fa-caret-down", "fa-caret-left", "fa-caret-right", "fa-caret-up", "fa-cart-plus", "fa-certificate", "fa-chart-area", "fa-chart-bar", "fa-chart-line", "fa-chart-pie", "fa-check", "fa-check-circle", "fa-check-square", "fa-chess", "fa-chess-bishop", "fa-chess-board", "fa-chess-king", "fa-chess-knight", "fa-chess-pawn", "fa-chess-queen", "fa-chess-rook", "fa-chevron-circle-down", "fa-chevron-circle-left", "fa-chevron-circle-right", "fa-chevron-down", "fa-chevron-left", "fa-chevron-right", "fa-chevron-up", "fa-child", "fa-circle", "fa-circle-notch", "fa-clipboard", "fa-clipboard-check", "fa-clipboard-list", "fa-clock", "fa-clone", "fa-cloud", "fa-code", "fa-code-branch", "fa-coffee", "fa-cog", "fa-cogs", "fa-columns", "fa-comment", "fa-comment-alt", "fa-comment-dots", "fa-comment-slash", "fa-comments", "fa-compass", "fa-compress", "fa-copy", "fa-copyright", "fa-couch", "fa-credit-card", "fa-crop", "fa-crosshairs", "fa-cube", "fa-cubes", "fa-cut", "fa-database", "fa-deaf", "fa-desktop", "fa-diagnoses", "fa-dna", "fa-dollar-sign", "fa-dolly", "fa-dolly-flatbed", "fa-donate", "fa-dot-circle", "fa-dove", "fa-download", "fa-edit", "fa-eject", "fa-ellipsis-h", "fa-ellipsis-v", "fa-envelope", "fa-envelope-open", "fa-envelope-square", "fa-eraser", "fa-euro-sign", "fa-exchange-alt", "fa-exclamation", "fa-exclamation-circle", "fa-exclamation-triangle", "fa-expand", "fa-external-link-alt", "fa-external-link-square-alt", "fa-eye", "fa-eye-dropper", "fa-eye-slash", "fa-fast-backward", "fa-fast-forward", "fa-fax", "fa-female", "fa-fighter-jet", "fa-file", "fa-file-alt", "fa-file-archive", "fa-file-audio", "fa-file-code", "fa-file-excel", "fa-file-image", "fa-file-medical", "fa-file-medical-alt", "fa-file-pdf", "fa-file-video", "fa-file-word", "fa-film", "fa-filter", "fa-fire", "fa-fire-extinguisher", "fa-first-aid", "fa-flag", "fa-flag-checkered", "fa-flask", "fa-folder", "fa-folder-open", "fa-font", "fa-football-ball", "fa-forward", "fa-frown", "fa-futbol", "fa-gamepad", "fa-gavel", "fa-gem", "fa-genderless", "fa-gift", "fa-glass-martini", "fa-globe", "fa-golf-ball", "fa-graduation-cap", "fa-h-square", "fa-hand-holding", "fa-hand-holding-heart", "fa-hand-holding-usd", "fa-hand-lizard", "fa-hand-paper", "fa-hand-peace", "fa-hand-point-down", "fa-hand-point-left", "fa-hand-point-right", "fa-hand-point-up", "fa-hand-pointer", "fa-hand-rock", "fa-hand-scissors", "fa-hand-spock", "fa-hands", "fa-hands-helping", "fa-handshake", "fa-hashtag", "fa-hdd", "fa-heading", "fa-headphones", "fa-heart", "fa-heartbeat", "fa-history", "fa-hockey-puck", "fa-home", "fa-hospital", "fa-hospital-alt", "fa-hospital", "fa-hourglass", "fa-hourglass-end", "fa-hourglass-half", "fa-hourglass-start", "fa-i-cursor", "fa-id-badge", "fa-id-card", "fa-id-card-alt", "fa-image", "fa-images", "fa-inbox", "fa-indent", "fa-industry", "fa-info", "fa-info-circle", "fa-italic", "fa-key", "fa-keyboard", "fa-language", "fa-laptop", "fa-leaf", "fa-lemon", "fa-level-down-alt", "fa-level-up-alt", "fa-life-ring", "fa-lightbulb", "fa-link", "fa-lira-sign", "fa-list", "fa-list-alt", "fa-list-ol", "fa-list-ul", "fa-location-arrow", "fa-lock", "fa-lock-open", "fa-long-arrow-alt-down", "fa-long-arrow-alt-left", "fa-long-arrow-alt-right", "fa-long-arrow-alt-up", "fa-low-vision", "fa-magic", "fa-magnet", "fa-male", "fa-map", "fa-map-marker", "fa-map-marker-alt", "fa-map-pin", "fa-map-signs", "fa-mars", "fa-mars-double", "fa-mars-stroke", "fa-mars-stroke-h", "fa-mars-stroke-v", "fa-medkit", "fa-meh", "fa-mercury", "fa-microchip", "fa-microphone", "fa-microphone-slash", "fa-minus", "fa-minus-circle", "fa-minus-square", "fa-mobile", "fa-mobile-alt", "fa-money-bill-alt", "fa-moon", "fa-motorcycle", "fa-mouse-pointer", "fa-music", "fa-neuter", "fa-newspaper", "fa-notes-medical", "fa-object-group", "fa-object-ungroup", "fa-outdent", "fa-paint-brush", "fa-pallet", "fa-paper-plane", "fa-paperclip", "fa-parachute-box", "fa-paragraph", "fa-paste", "fa-pause", "fa-pause-circle", "fa-paw", "fa-pen-square", "fa-pencil-alt", "fa-people-carry", "fa-percent", "fa-phone", "fa-phone-slash", "fa-phone-square", "fa-phone-volume", "fa-piggy-bank", "fa-pills", "fa-plane", "fa-play", "fa-play-circle", "fa-plug", "fa-plus", "fa-plus-circle", "fa-plus-square", "fa-podcast", "fa-poo", "fa-pound-sign", "fa-power-off", "fa-prescription-bottle", "fa-prescription-bottle-alt", "fa-print", "fa-procedures", "fa-puzzle-piece", "fa-qrcode", "fa-question", "fa-question", "fa-quidditch", "fa-quote-left", "fa-quote-right", "fa-random", "fa-recycle", "fa-redo", "fa-redo-alt", "fa-registered", "fa-reply", "fa-reply-all", "fa-retweet", "fa-ribbon", "fa-road", "fa-rocket", "fa-rss", "fa-rss-square", "fa-ruble-sign", "fa-rupee-sign", "fa-save", "fa-search", "fa-search-minus", "fa-search-plus", "fa-seedling", "fa-server", "fa-share", "fa-share-alt", "fa-share-alt-square", "fa-share-square", "fa-shekel-sign", "fa-shield-alt", "fa-ship", "fa-shipping-fast", "fa-shopping-bag", "fa-shopping-basket", "fa-shopping-cart", "fa-shower", "fa-sign", "fa-sign-in-alt", "fa-sign-language", "fa-sign-out-alt", "fa-signal", "fa-sitemap", "fa-sliders-h", "fa-smile", "fa-smoking", "fa-snowflake", "fa-sort", "fa-sort-alpha-up", "fa-sort-amount-down", "fa-sort-amount-up", "fa-sort-down", "fa-sort-numeric-down", "fa-sort-numeric-up", "fa-sort-up", "fa-space-shuttle", "fa-spinner", "fa-square", "fa-square-full", "fa-star", "fa-star-half", "fa-step-backward", "fa-step-forward", "fa-stethoscope", "fa-sticky-note", "fa-stop", "fa-stop-circle", "fa-stopwatch", "fa-street-view", "fa-strikethrough", "fa-subscript", "fa-subway", "fa-suitcase", "fa-sun", "fa-superscript", "fa-sync", "fa-sync-alt", "fa-syringe", "fa-table", "fa-table-tennis", "fa-tablet", "fa-tablet-alt", "fa-tablets", "fa-tachometer-alt", "fa-tag", "fa-tags", "fa-tape", "fa-tasks", "fa-taxi", "fa-terminal", "fa-text-height", "fa-text-width", "fa-th", "fa-th-large", "fa-th-list", "fa-thermometer", "fa-thermometer-empty", "fa-thermometer-full", "fa-thermometer-half", "fa-thermometer-quarter", "fa-thermometer-three-quarters", "fa-thumbs-down", "fa-thumbs-up", "fa-thumbtack", "fa-ticket-alt", "fa-times", "fa-times-circle", "fa-tint", "fa-toggle-off", "fa-toggle-on", "fa-trademark", "fa-train", "fa-transgender", "fa-trash", "fa-trash-alt", "fa-tree", "fa-trophy", "fa-truck", "fa-truck-loading", "fa-truck-moving", "fa-tty", "fa-tv", "fa-umbrella", "fa-underline", "fa-undo", "fa-undo-alt", "fa-universal-access", "fa-university", "fa-unlink", "fa-unlock", "fa-unlock-alt", "fa-upload", "fa-user", "fa-user-circle", "fa-user-md", "fa-user-plus", "fa-user-secret", "fa-user-times", "fa-users", "fa-utensil-spoon", "fa-utensils", "fa-venus", "fa-venus-double", "fa-venus-mars", "fa-vial", "fa-vials", "fa-video", "fa-video-slash", "fa-volume-down", "fa-volume-off", "fa-volume-up", "fa-warehouse", "fa-weight", "fa-wheelchair", "fa-wifi", "fa-window-close", "fa-window-maximize", "fa-window-minimize", "fa-window-restore", "fa-wine-glass", "fa-won-sign", "fa-wrench", "fa-x-ray", "fa-yen-sign"];
    }
}