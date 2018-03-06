<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width,user-scalable=yes,initial-scale=1,maximum-scale=1">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="PayRoll 100%">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Unity Funds">
    <meta name="theme-color" content="#4C7FF0">
    <title>Tbc2 Trade - User Dashboard</title>
    <script type="text/javascript">
        //<![CDATA[
        try {
            if (!window.CloudFlare) {
                var CloudFlare = [{
                    verbose: 0,
                    p: 1486579129,
                    byc: 0,
                    owlid: "cf",
                    bag2: 1,
                    mirage2: 0,
                    oracle: 0,
                    paths: {
                        cloudflare: "/cdn-cgi/nexp/dok3v=1613a3a185/"
                    },
                    atok: "4a2c8cdb38e721100ea2e29837252aa4",
                    petok: "0690044860534d559d9ce0313101ca7d72eacc9f-1487346637-1800",
                    zone: "nyasha.me",
                    rocket: "0",
                    apps: {
                        "ga_key": {
                            "ua": "UA-50530436-1",
                            "ga_bs": "2"
                        }
                    }
                }];
                ! function(a, b) {
                    a = document.createElement("script"), b = document.getElementsByTagName("script")[0], a.async = !0, a.src = "//ajax.cloudflare.com/cdn-cgi/nexp/dok3v=f2befc48d1/cloudflare.min.js", b.parentNode.insertBefore(a, b)
                }()
            }
        } catch (e) {};
        //]]>
    </script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bower-jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>styles/app.min.css">
    <script type="text/javascript">
        /* <![CDATA[ */
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-50530436-1']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();

        (function(b) {
            (function(a) {
                "__CF" in b && "DJS" in b.__CF ? b.__CF.DJS.push(a) : "addEventListener" in b ? b.addEventListener("load", a, !1) : b.attachEvent("onload", a)
            })(function() {
                "FB" in b && "Event" in FB && "subscribe" in FB.Event && (FB.Event.subscribe("edge.create", function(a) {
                    _gaq.push(["_trackSocial", "facebook", "like", a])
                }), FB.Event.subscribe("edge.remove", function(a) {
                    _gaq.push(["_trackSocial", "facebook", "unlike", a])
                }), FB.Event.subscribe("message.send", function(a) {
                    _gaq.push(["_trackSocial", "facebook", "send", a])
                }));
                "twttr" in b && "events" in twttr && "bind" in twttr.events && twttr.events.bind("tweet", function(a) {
                    if (a) {
                        var b;
                        if (a.target && a.target.nodeName == "IFRAME") a: {
                            if (a = a.target.src) {
                                a = a.split("#")[0].match(/[^?=&]+=([^&]*)?/g);
                                b = 0;
                                for (var c; c = a[b]; ++b)
                                    if (c.indexOf("url") === 0) {
                                        b = unescape(c.split("=")[1]);
                                        break a
                                    }
                            }
                            b = void 0
                        }
                        _gaq.push(["_trackSocial", "twitter", "tweet", b])
                    }
                })
            })
        })(window);
        /* ]]> */
    </script>
</head>

<body>
    <div class="app">
      <?php $this->load->view('partials/sidebar'); ?>
        <div class="main-panel">
          <?php $this->load->view('partials/nav'); ?>
            <div class="main-content">
                <div class="content-view">
                  <!-- Content Disposition -->
                  <script src="<?php echo base_url(); ?>bower_components/jquery/dist/jquery.min.js"></script>
                  <?php if (is_array($view_url)): ?>
                    <?php foreach ($view_url as $inner_view): ?>
                      <?php $this->load->view($inner_view); ?>
                    <?php endforeach; ?>
                    <?php else: $this->load->view($view_url); ?>?>
                  <?php endif; ?>
                    </div>
                    <?php $this->load->view('partials/footer'); ?>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        window.paceOptions = {
            document: true,
            eventLag: true,
            restartOnPushState: true,
            restartOnRequestAfter: true,
            ajax: {
                trackMethods: ['POST', 'GET']
            }
        };
    </script>
    <script src="<?php echo base_url(); ?>scripts/app.min.js"></script>
    <script src="<?php echo base_url(); ?>vendor/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url(); ?>vendor/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url(); ?>vendor/flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url(); ?>vendor/flot-spline/js/jquery.flot.spline.js"></script>
    <script src="<?php echo base_url(); ?>vendor/bower-jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo base_url(); ?>data/maps/jquery-jvectormap-us-aea.js"></script>
    <script src="<?php echo base_url(); ?>vendor/jquery.easy-pie-chart/dist/jquery.easypiechart.js"></script>
    <script src="<?php echo base_url(); ?>vendor/noty/js/noty/packaged/jquery.noty.packaged.min.js"></script>
    <script src="<?php echo base_url(); ?>scripts/helpers/noty-defaults.js"></script>
    <script src="<?php echo base_url(); ?>scripts/dashboard/dashboard.js"></script>
    <script src="<?php echo base_url(); ?>bower_components/jquery.countdown/dist/jquery.countdown.min.js"></script>
    <script type="text/javascript">
    (function () {
      var date = new Date();
      var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
      var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);

      var lastDayWithSlashes = (lastDay.getFullYear()) + '/' + (lastDay.getMonth() + 1) + '/' + (lastDay.getDate());
      $("#clock").attr("data-countdown", lastDayWithSlashes);
    })();

      $('[data-countdown]').each(function() {
        var $this = $(this), finalDate = $(this).data('countdown');
        $this.countdown(finalDate, function(event) {
          $this.html(event.strftime('%D days %H:%M:%S'));
        });
      });


    </script>
</body>

</html>
