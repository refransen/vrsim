


<!DOCTYPE html>
<html>
  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# githubog: http://ogp.me/ns/fb/githubog#">
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>moodle/admin/tool/health/index.php at wip_MDL-34684_2.4_corruptedcategories · logan-reynolds/moodle · GitHub</title>
    <link rel="search" type="application/opensearchdescription+xml" href="/opensearch.xml" title="GitHub" />
    <link rel="fluid-icon" href="https://github.com/fluidicon.png" title="GitHub" />
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-114.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-144.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144.png" />
    <link rel="logo" type="image/svg" href="https://github-media-downloads.s3.amazonaws.com/github-logo.svg" />
    <meta property="og:image" content="https://github.global.ssl.fastly.net/images/modules/logos_page/Octocat.png">
    <meta name="hostname" content="github-fe113-cp1-prd.iad.github.net">
    <meta name="ruby" content="ruby 1.9.3p194-tcs-github-tcmalloc (0e75de19f8) [x86_64-linux]">
    <link rel="assets" href="https://github.global.ssl.fastly.net/">
    <link rel="conduit-xhr" href="https://ghconduit.com:25035/">
    <link rel="xhr-socket" href="/_sockets" />
    


    <meta name="msapplication-TileImage" content="/windows-tile.png" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="selected-link" value="repo_source" data-pjax-transient />
    <meta content="collector.githubapp.com" name="octolytics-host" /><meta content="collector-cdn.github.com" name="octolytics-script-host" /><meta content="github" name="octolytics-app-id" /><meta content="5469EB4C:1D91:E61FA9:5272249C" name="octolytics-dimension-request_id" />
    

    
    
    <link rel="icon" type="image/x-icon" href="/favicon.ico" />

    <meta content="authenticity_token" name="csrf-param" />
<meta content="qDzNlXQ23n0C7uBevStfd3XvWB6Gn3lOx0O/vOdl6tE=" name="csrf-token" />

    <link href="https://github.global.ssl.fastly.net/assets/github-c1c8f4d1225e3ae12e7eed7a87e6125ec4f4c50a.css" media="all" rel="stylesheet" type="text/css" />
    <link href="https://github.global.ssl.fastly.net/assets/github2-8fec94fba24057242ac5eac0b01b2fd60b5d3812.css" media="all" rel="stylesheet" type="text/css" />
    

    

      <script src="https://github.global.ssl.fastly.net/assets/frameworks-fedd15115b82c3d5d2afa34f475ba2caa6283613.js" type="text/javascript"></script>
      <script src="https://github.global.ssl.fastly.net/assets/github-ccddde7443989910dd83a01393e3eae42fefe313.js" type="text/javascript"></script>
      
      <meta http-equiv="x-pjax-version" content="f4ceb2d064b3adad5e97504bf2042d70">

        <link data-pjax-transient rel='permalink' href='/logan-reynolds/moodle/blob/a268cca9a343cbb79c8d0fbf5e94d2ffbc1ddf03/admin/tool/health/index.php'>
  <meta property="og:title" content="moodle"/>
  <meta property="og:type" content="githubog:gitrepository"/>
  <meta property="og:url" content="https://github.com/logan-reynolds/moodle"/>
  <meta property="og:image" content="https://github.global.ssl.fastly.net/images/gravatars/gravatar-user-420.png"/>
  <meta property="og:site_name" content="GitHub"/>
  <meta property="og:description" content="A direct mirror of the official moodle.git repository at http://git.moodle.org/.   Please do NOT file PULL requests here, instead please use http://tracker.moodle.org"/>

  <meta name="description" content="A direct mirror of the official moodle.git repository at http://git.moodle.org/.   Please do NOT file PULL requests here, instead please use http://tracker.moodle.org" />

  <meta content="4237443" name="octolytics-dimension-user_id" /><meta content="logan-reynolds" name="octolytics-dimension-user_login" /><meta content="9629429" name="octolytics-dimension-repository_id" /><meta content="logan-reynolds/moodle" name="octolytics-dimension-repository_nwo" /><meta content="true" name="octolytics-dimension-repository_public" /><meta content="true" name="octolytics-dimension-repository_is_fork" /><meta content="439861" name="octolytics-dimension-repository_parent_id" /><meta content="moodle/moodle" name="octolytics-dimension-repository_parent_nwo" /><meta content="439861" name="octolytics-dimension-repository_network_root_id" /><meta content="moodle/moodle" name="octolytics-dimension-repository_network_root_nwo" />
  <link href="https://github.com/logan-reynolds/moodle/commits/wip_MDL-34684_2.4_corruptedcategories.atom" rel="alternate" title="Recent Commits to moodle:wip_MDL-34684_2.4_corruptedcategories" type="application/atom+xml" />

  </head>


  <body class="logged_out  env-production windows vis-public fork  page-blob">
    <div class="wrapper">
      
      
      


      
      <div class="header header-logged-out">
  <div class="container clearfix">

    <a class="header-logo-wordmark" href="https://github.com/">
      <span class="mega-octicon octicon-logo-github"></span>
    </a>

    <div class="header-actions">
        <a class="button primary" href="/join">Sign up</a>
      <a class="button signin" href="/login?return_to=%2Flogan-reynolds%2Fmoodle%2Fblob%2Fwip_MDL-34684_2.4_corruptedcategories%2Fadmin%2Ftool%2Fhealth%2Findex.php">Sign in</a>
    </div>

    <div class="command-bar js-command-bar  in-repository">

      <ul class="top-nav">
          <li class="explore"><a href="/explore">Explore</a></li>
        <li class="features"><a href="/features">Features</a></li>
          <li class="enterprise"><a href="https://enterprise.github.com/">Enterprise</a></li>
          <li class="blog"><a href="/blog">Blog</a></li>
      </ul>
        <form accept-charset="UTF-8" action="/search" class="command-bar-form" id="top_search_form" method="get">

<input type="text" data-hotkey="/ s" name="q" id="js-command-bar-field" placeholder="Search or type a command" tabindex="1" autocapitalize="off"
    
    
      data-repo="logan-reynolds/moodle"
      data-branch="wip_MDL-34684_2.4_corruptedcategories"
      data-sha="5f890e63e85cba81d0bd974602f15d314cddebb2"
  >

    <input type="hidden" name="nwo" value="logan-reynolds/moodle" />

    <div class="select-menu js-menu-container js-select-menu search-context-select-menu">
      <span class="minibutton select-menu-button js-menu-target">
        <span class="js-select-button">This repository</span>
      </span>

      <div class="select-menu-modal-holder js-menu-content js-navigation-container">
        <div class="select-menu-modal">

          <div class="select-menu-item js-navigation-item js-this-repository-navigation-item selected">
            <span class="select-menu-item-icon octicon octicon-check"></span>
            <input type="radio" class="js-search-this-repository" name="search_target" value="repository" checked="checked" />
            <div class="select-menu-item-text js-select-button-text">This repository</div>
          </div> <!-- /.select-menu-item -->

          <div class="select-menu-item js-navigation-item js-all-repositories-navigation-item">
            <span class="select-menu-item-icon octicon octicon-check"></span>
            <input type="radio" name="search_target" value="global" />
            <div class="select-menu-item-text js-select-button-text">All repositories</div>
          </div> <!-- /.select-menu-item -->

        </div>
      </div>
    </div>

  <span class="octicon help tooltipped downwards" title="Show command bar help">
    <span class="octicon octicon-question"></span>
  </span>


  <input type="hidden" name="ref" value="cmdform">

</form>
    </div>

  </div>
</div>


      


          <div class="site" itemscope itemtype="http://schema.org/WebPage">
    
    <div class="pagehead repohead instapaper_ignore readability-menu">
      <div class="container">
        

<ul class="pagehead-actions">


  <li>
  <a href="/login?return_to=%2Flogan-reynolds%2Fmoodle"
  class="minibutton with-count js-toggler-target star-button entice tooltipped upwards"
  title="You must be signed in to use this feature" rel="nofollow">
  <span class="octicon octicon-star"></span>Star
</a>
<a class="social-count js-social-count" href="/logan-reynolds/moodle/stargazers">
  0
</a>

  </li>

    <li>
      <a href="/login?return_to=%2Flogan-reynolds%2Fmoodle"
        class="minibutton with-count js-toggler-target fork-button entice tooltipped upwards"
        title="You must be signed in to fork a repository" rel="nofollow">
        <span class="octicon octicon-git-branch"></span>Fork
      </a>
      <a href="/logan-reynolds/moodle/network" class="social-count">
        1,073
      </a>
    </li>
</ul>

        <h1 itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="entry-title public">
          <span class="repo-label"><span>public</span></span>
          <span class="mega-octicon octicon-repo"></span>
          <span class="author">
            <a href="/logan-reynolds" class="url fn" itemprop="url" rel="author"><span itemprop="title">logan-reynolds</span></a>
          </span>
          <span class="repohead-name-divider">/</span>
          <strong><a href="/logan-reynolds/moodle" class="js-current-repository js-repo-home-link">moodle</a></strong>

          <span class="page-context-loader">
            <img alt="Octocat-spinner-32" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
          </span>

            <span class="fork-flag">
              <span class="text">forked from <a href="/moodle/moodle">moodle/moodle</a></span>
            </span>
        </h1>
      </div><!-- /.container -->
    </div><!-- /.repohead -->

    <div class="container">

      <div class="repository-with-sidebar repo-container ">

        <div class="repository-sidebar">
            

<div class="sunken-menu vertical-right repo-nav js-repo-nav js-repository-container-pjax js-octicon-loaders">
  <div class="sunken-menu-contents">
    <ul class="sunken-menu-group">
      <li class="tooltipped leftwards" title="Code">
        <a href="/logan-reynolds/moodle/tree/wip_MDL-34684_2.4_corruptedcategories" aria-label="Code" class="selected js-selected-navigation-item sunken-menu-item" data-gotokey="c" data-pjax="true" data-selected-links="repo_source repo_downloads repo_commits repo_tags repo_branches /logan-reynolds/moodle/tree/wip_MDL-34684_2.4_corruptedcategories">
          <span class="octicon octicon-code"></span> <span class="full-word">Code</span>
          <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>      </li>


      <li class="tooltipped leftwards" title="Pull Requests"><a href="/logan-reynolds/moodle/pulls" aria-label="Pull Requests" class="js-selected-navigation-item sunken-menu-item js-disable-pjax" data-gotokey="p" data-selected-links="repo_pulls /logan-reynolds/moodle/pulls">
            <span class="octicon octicon-git-pull-request"></span> <span class="full-word">Pull Requests</span>
            <span class='counter'>0</span>
            <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>      </li>


    </ul>
    <div class="sunken-menu-separator"></div>
    <ul class="sunken-menu-group">

      <li class="tooltipped leftwards" title="Pulse">
        <a href="/logan-reynolds/moodle/pulse" aria-label="Pulse" class="js-selected-navigation-item sunken-menu-item" data-pjax="true" data-selected-links="pulse /logan-reynolds/moodle/pulse">
          <span class="octicon octicon-pulse"></span> <span class="full-word">Pulse</span>
          <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>      </li>

      <li class="tooltipped leftwards" title="Graphs">
        <a href="/logan-reynolds/moodle/graphs" aria-label="Graphs" class="js-selected-navigation-item sunken-menu-item" data-pjax="true" data-selected-links="repo_graphs repo_contributors /logan-reynolds/moodle/graphs">
          <span class="octicon octicon-graph"></span> <span class="full-word">Graphs</span>
          <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>      </li>

      <li class="tooltipped leftwards" title="Network">
        <a href="/logan-reynolds/moodle/network" aria-label="Network" class="js-selected-navigation-item sunken-menu-item js-disable-pjax" data-selected-links="repo_network /logan-reynolds/moodle/network">
          <span class="octicon octicon-git-branch"></span> <span class="full-word">Network</span>
          <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>      </li>
    </ul>


  </div>
</div>

            <div class="only-with-full-nav">
              

  

<div class="clone-url open"
  data-protocol-type="http"
  data-url="/users/set_protocol?protocol_selector=http&amp;protocol_type=clone">
  <h3><strong>HTTPS</strong> clone URL</h3>
  <div class="clone-url-box">
    <input type="text" class="clone js-url-field"
           value="https://github.com/logan-reynolds/moodle.git" readonly="readonly">

    <span class="js-zeroclipboard url-box-clippy minibutton zeroclipboard-button" data-clipboard-text="https://github.com/logan-reynolds/moodle.git" data-copied-hint="copied!" title="copy to clipboard"><span class="octicon octicon-clippy"></span></span>
  </div>
</div>

  

<div class="clone-url "
  data-protocol-type="subversion"
  data-url="/users/set_protocol?protocol_selector=subversion&amp;protocol_type=clone">
  <h3><strong>Subversion</strong> checkout URL</h3>
  <div class="clone-url-box">
    <input type="text" class="clone js-url-field"
           value="https://github.com/logan-reynolds/moodle" readonly="readonly">

    <span class="js-zeroclipboard url-box-clippy minibutton zeroclipboard-button" data-clipboard-text="https://github.com/logan-reynolds/moodle" data-copied-hint="copied!" title="copy to clipboard"><span class="octicon octicon-clippy"></span></span>
  </div>
</div>


<p class="clone-options">You can clone with
      <a href="#" class="js-clone-selector" data-protocol="http">HTTPS</a>,
      or <a href="#" class="js-clone-selector" data-protocol="subversion">Subversion</a>.
  <span class="octicon help tooltipped upwards" title="Get help on which URL is right for you.">
    <a href="https://help.github.com/articles/which-remote-url-should-i-use">
    <span class="octicon octicon-question"></span>
    </a>
  </span>
</p>


  <a href="http://windows.github.com" class="minibutton sidebar-button">
    <span class="octicon octicon-device-desktop"></span>
    Clone in Desktop
  </a>

              <a href="/logan-reynolds/moodle/archive/wip_MDL-34684_2.4_corruptedcategories.zip"
                 class="minibutton sidebar-button"
                 title="Download this repository as a zip file"
                 rel="nofollow">
                <span class="octicon octicon-cloud-download"></span>
                Download ZIP
              </a>
            </div>
        </div><!-- /.repository-sidebar -->

        <div id="js-repo-pjax-container" class="repository-content context-loader-container" data-pjax-container>
          


<!-- blob contrib key: blob_contributors:v21:a69f43ad626085d9b243d4665f83877b -->

<p title="This is a placeholder element" class="js-history-link-replace hidden"></p>

<a href="/logan-reynolds/moodle/find/wip_MDL-34684_2.4_corruptedcategories" data-pjax data-hotkey="t" class="js-show-file-finder" style="display:none">Show File Finder</a>

<div class="file-navigation">
  
  

<div class="select-menu js-menu-container js-select-menu" >
  <span class="minibutton select-menu-button js-menu-target" data-hotkey="w"
    data-master-branch="master"
    data-ref="wip_MDL-34684_2.4_corruptedcategories"
    role="button" aria-label="Switch branches or tags" tabindex="0">
    <span class="octicon octicon-git-branch"></span>
    <i>branch:</i>
    <span class="js-select-button">wip_MDL-34684_…</span>
  </span>

  <div class="select-menu-modal-holder js-menu-content js-navigation-container" data-pjax>

    <div class="select-menu-modal">
      <div class="select-menu-header">
        <span class="select-menu-title">Switch branches/tags</span>
        <span class="octicon octicon-remove-close js-menu-close"></span>
      </div> <!-- /.select-menu-header -->

      <div class="select-menu-filters">
        <div class="select-menu-text-filter">
          <input type="text" aria-label="Filter branches/tags" id="context-commitish-filter-field" class="js-filterable-field js-navigation-enable" placeholder="Filter branches/tags">
        </div>
        <div class="select-menu-tabs">
          <ul>
            <li class="select-menu-tab">
              <a href="#" data-tab-filter="branches" class="js-select-menu-tab">Branches</a>
            </li>
            <li class="select-menu-tab">
              <a href="#" data-tab-filter="tags" class="js-select-menu-tab">Tags</a>
            </li>
          </ul>
        </div><!-- /.select-menu-tabs -->
      </div><!-- /.select-menu-filters -->

      <div class="select-menu-list select-menu-tab-bucket js-select-menu-tab-bucket" data-tab-filter="branches">

        <div data-filterable-for="context-commitish-filter-field" data-filterable-type="substring">


            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/blob/MOODLE_13_STABLE/admin/tool/health/index.php"
                 data-name="MOODLE_13_STABLE"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="MOODLE_13_STABLE">MOODLE_13_STABLE</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/blob/MOODLE_14_STABLE/admin/tool/health/index.php"
                 data-name="MOODLE_14_STABLE"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="MOODLE_14_STABLE">MOODLE_14_STABLE</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/blob/MOODLE_15_STABLE/admin/tool/health/index.php"
                 data-name="MOODLE_15_STABLE"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="MOODLE_15_STABLE">MOODLE_15_STABLE</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/blob/MOODLE_16_STABLE/admin/tool/health/index.php"
                 data-name="MOODLE_16_STABLE"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="MOODLE_16_STABLE">MOODLE_16_STABLE</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/blob/MOODLE_17_STABLE/admin/tool/health/index.php"
                 data-name="MOODLE_17_STABLE"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="MOODLE_17_STABLE">MOODLE_17_STABLE</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/blob/MOODLE_18_STABLE/admin/tool/health/index.php"
                 data-name="MOODLE_18_STABLE"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="MOODLE_18_STABLE">MOODLE_18_STABLE</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/blob/MOODLE_19_STABLE/admin/tool/health/index.php"
                 data-name="MOODLE_19_STABLE"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="MOODLE_19_STABLE">MOODLE_19_STABLE</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/blob/MOODLE_20_STABLE/admin/tool/health/index.php"
                 data-name="MOODLE_20_STABLE"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="MOODLE_20_STABLE">MOODLE_20_STABLE</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/blob/MOODLE_21_STABLE/admin/tool/health/index.php"
                 data-name="MOODLE_21_STABLE"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="MOODLE_21_STABLE">MOODLE_21_STABLE</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/blob/MOODLE_22_STABLE/admin/tool/health/index.php"
                 data-name="MOODLE_22_STABLE"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="MOODLE_22_STABLE">MOODLE_22_STABLE</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/blob/MOODLE_23_STABLE/admin/tool/health/index.php"
                 data-name="MOODLE_23_STABLE"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="MOODLE_23_STABLE">MOODLE_23_STABLE</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/blob/MOODLE_24_STABLE/admin/tool/health/index.php"
                 data-name="MOODLE_24_STABLE"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="MOODLE_24_STABLE">MOODLE_24_STABLE</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/blob/MOODLE_25_STABLE/admin/tool/health/index.php"
                 data-name="MOODLE_25_STABLE"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="MOODLE_25_STABLE">MOODLE_25_STABLE</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/blob/master/admin/tool/health/index.php"
                 data-name="master"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="master">master</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/blob/wip_MDL-34388_2.3_largebackuprestore/admin/tool/health/index.php"
                 data-name="wip_MDL-34388_2.3_largebackuprestore"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="wip_MDL-34388_2.3_largebackuprestore">wip_MDL-34388_2.3_largebackuprestore</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/blob/wip_MDL-34388_2.4_largebackuprestore/admin/tool/health/index.php"
                 data-name="wip_MDL-34388_2.4_largebackuprestore"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="wip_MDL-34388_2.4_largebackuprestore">wip_MDL-34388_2.4_largebackuprestore</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/blob/wip_MDL-34388_2.5_largebackuprestore/admin/tool/health/index.php"
                 data-name="wip_MDL-34388_2.5_largebackuprestore"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="wip_MDL-34388_2.5_largebackuprestore">wip_MDL-34388_2.5_largebackuprestore</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/blob/wip_MDL-34684_2.2_corruptedcategories/admin/tool/health/index.php"
                 data-name="wip_MDL-34684_2.2_corruptedcategories"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="wip_MDL-34684_2.2_corruptedcategories">wip_MDL-34684_2.2_corruptedcategories</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/blob/wip_MDL-34684_2.3_corruptedcategories/admin/tool/health/index.php"
                 data-name="wip_MDL-34684_2.3_corruptedcategories"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="wip_MDL-34684_2.3_corruptedcategories">wip_MDL-34684_2.3_corruptedcategories</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item selected">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/blob/wip_MDL-34684_2.4_corruptedcategories/admin/tool/health/index.php"
                 data-name="wip_MDL-34684_2.4_corruptedcategories"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="wip_MDL-34684_2.4_corruptedcategories">wip_MDL-34684_2.4_corruptedcategories</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/blob/wip_MDL-34684_2.5_corruptedcategories/admin/tool/health/index.php"
                 data-name="wip_MDL-34684_2.5_corruptedcategories"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="wip_MDL-34684_2.5_corruptedcategories">wip_MDL-34684_2.5_corruptedcategories</a>
            </div> <!-- /.select-menu-item -->
        </div>

          <div class="select-menu-no-results">Nothing to show</div>
      </div> <!-- /.select-menu-list -->

      <div class="select-menu-list select-menu-tab-bucket js-select-menu-tab-bucket" data-tab-filter="tags">
        <div data-filterable-for="context-commitish-filter-field" data-filterable-type="substring">


            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.5.0-beta/admin/tool/health/index.php"
                 data-name="v2.5.0-beta"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.5.0-beta">v2.5.0-beta</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.4.3/admin/tool/health/index.php"
                 data-name="v2.4.3"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.4.3">v2.4.3</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.4.2/admin/tool/health/index.php"
                 data-name="v2.4.2"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.4.2">v2.4.2</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.4.1/admin/tool/health/index.php"
                 data-name="v2.4.1"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.4.1">v2.4.1</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.4.0-rc1/admin/tool/health/index.php"
                 data-name="v2.4.0-rc1"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.4.0-rc1">v2.4.0-rc1</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.4.0-beta/admin/tool/health/index.php"
                 data-name="v2.4.0-beta"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.4.0-beta">v2.4.0-beta</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.4.0/admin/tool/health/index.php"
                 data-name="v2.4.0"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.4.0">v2.4.0</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.3.6/admin/tool/health/index.php"
                 data-name="v2.3.6"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.3.6">v2.3.6</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.3.5/admin/tool/health/index.php"
                 data-name="v2.3.5"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.3.5">v2.3.5</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.3.4/admin/tool/health/index.php"
                 data-name="v2.3.4"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.3.4">v2.3.4</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.3.3/admin/tool/health/index.php"
                 data-name="v2.3.3"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.3.3">v2.3.3</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.3.2/admin/tool/health/index.php"
                 data-name="v2.3.2"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.3.2">v2.3.2</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.3.1/admin/tool/health/index.php"
                 data-name="v2.3.1"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.3.1">v2.3.1</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.3.0-rc1/admin/tool/health/index.php"
                 data-name="v2.3.0-rc1"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.3.0-rc1">v2.3.0-rc1</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.3.0-beta/admin/tool/health/index.php"
                 data-name="v2.3.0-beta"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.3.0-beta">v2.3.0-beta</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.3.0/admin/tool/health/index.php"
                 data-name="v2.3.0"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.3.0">v2.3.0</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.2.9/admin/tool/health/index.php"
                 data-name="v2.2.9"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.2.9">v2.2.9</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.2.8/admin/tool/health/index.php"
                 data-name="v2.2.8"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.2.8">v2.2.8</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.2.7/admin/tool/health/index.php"
                 data-name="v2.2.7"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.2.7">v2.2.7</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.2.6/admin/tool/health/index.php"
                 data-name="v2.2.6"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.2.6">v2.2.6</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.2.5/admin/tool/health/index.php"
                 data-name="v2.2.5"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.2.5">v2.2.5</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.2.4/admin/tool/health/index.php"
                 data-name="v2.2.4"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.2.4">v2.2.4</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.2.3/admin/tool/health/index.php"
                 data-name="v2.2.3"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.2.3">v2.2.3</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.2.2/admin/tool/health/index.php"
                 data-name="v2.2.2"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.2.2">v2.2.2</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.2.1/admin/tool/health/index.php"
                 data-name="v2.2.1"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.2.1">v2.2.1</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.2.0-rc1/admin/tool/health/index.php"
                 data-name="v2.2.0-rc1"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.2.0-rc1">v2.2.0-rc1</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.2.0-beta/admin/tool/health/index.php"
                 data-name="v2.2.0-beta"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.2.0-beta">v2.2.0-beta</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.2.0/admin/tool/health/index.php"
                 data-name="v2.2.0"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.2.0">v2.2.0</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.1.10/admin/tool/health/index.php"
                 data-name="v2.1.10"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.1.10">v2.1.10</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.1.9/admin/tool/health/index.php"
                 data-name="v2.1.9"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.1.9">v2.1.9</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.1.8/admin/tool/health/index.php"
                 data-name="v2.1.8"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.1.8">v2.1.8</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.1.7/admin/tool/health/index.php"
                 data-name="v2.1.7"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.1.7">v2.1.7</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.1.6/admin/tool/health/index.php"
                 data-name="v2.1.6"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.1.6">v2.1.6</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.1.5/admin/tool/health/index.php"
                 data-name="v2.1.5"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.1.5">v2.1.5</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.1.4/admin/tool/health/index.php"
                 data-name="v2.1.4"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.1.4">v2.1.4</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.1.3/admin/tool/health/index.php"
                 data-name="v2.1.3"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.1.3">v2.1.3</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.1.2/admin/tool/health/index.php"
                 data-name="v2.1.2"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.1.2">v2.1.2</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.1.1/admin/tool/health/index.php"
                 data-name="v2.1.1"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.1.1">v2.1.1</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.1.0/admin/tool/health/index.php"
                 data-name="v2.1.0"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.1.0">v2.1.0</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.0.10/admin/tool/health/index.php"
                 data-name="v2.0.10"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.0.10">v2.0.10</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.0.9/admin/tool/health/index.php"
                 data-name="v2.0.9"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.0.9">v2.0.9</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.0.8/admin/tool/health/index.php"
                 data-name="v2.0.8"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.0.8">v2.0.8</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.0.7/admin/tool/health/index.php"
                 data-name="v2.0.7"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.0.7">v2.0.7</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.0.6/admin/tool/health/index.php"
                 data-name="v2.0.6"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.0.6">v2.0.6</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.0.5/admin/tool/health/index.php"
                 data-name="v2.0.5"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.0.5">v2.0.5</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.0.4/admin/tool/health/index.php"
                 data-name="v2.0.4"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.0.4">v2.0.4</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.0.3/admin/tool/health/index.php"
                 data-name="v2.0.3"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.0.3">v2.0.3</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.0.2/admin/tool/health/index.php"
                 data-name="v2.0.2"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.0.2">v2.0.2</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.0.1/admin/tool/health/index.php"
                 data-name="v2.0.1"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.0.1">v2.0.1</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.0.0-rc2/admin/tool/health/index.php"
                 data-name="v2.0.0-rc2"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.0.0-rc2">v2.0.0-rc2</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.0.0-rc1/admin/tool/health/index.php"
                 data-name="v2.0.0-rc1"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.0.0-rc1">v2.0.0-rc1</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v2.0.0/admin/tool/health/index.php"
                 data-name="v2.0.0"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v2.0.0">v2.0.0</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.9.19/admin/tool/health/index.php"
                 data-name="v1.9.19"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.9.19">v1.9.19</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.9.18/admin/tool/health/index.php"
                 data-name="v1.9.18"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.9.18">v1.9.18</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.9.17/admin/tool/health/index.php"
                 data-name="v1.9.17"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.9.17">v1.9.17</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.9.16/admin/tool/health/index.php"
                 data-name="v1.9.16"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.9.16">v1.9.16</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.9.15/admin/tool/health/index.php"
                 data-name="v1.9.15"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.9.15">v1.9.15</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.9.14/admin/tool/health/index.php"
                 data-name="v1.9.14"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.9.14">v1.9.14</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.9.13/admin/tool/health/index.php"
                 data-name="v1.9.13"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.9.13">v1.9.13</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.9.12/admin/tool/health/index.php"
                 data-name="v1.9.12"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.9.12">v1.9.12</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.9.11/admin/tool/health/index.php"
                 data-name="v1.9.11"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.9.11">v1.9.11</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.9.10/admin/tool/health/index.php"
                 data-name="v1.9.10"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.9.10">v1.9.10</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.9.9/admin/tool/health/index.php"
                 data-name="v1.9.9"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.9.9">v1.9.9</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.9.8/admin/tool/health/index.php"
                 data-name="v1.9.8"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.9.8">v1.9.8</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.9.7/admin/tool/health/index.php"
                 data-name="v1.9.7"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.9.7">v1.9.7</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.9.6/admin/tool/health/index.php"
                 data-name="v1.9.6"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.9.6">v1.9.6</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.9.5/admin/tool/health/index.php"
                 data-name="v1.9.5"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.9.5">v1.9.5</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.9.4/admin/tool/health/index.php"
                 data-name="v1.9.4"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.9.4">v1.9.4</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.9.3/admin/tool/health/index.php"
                 data-name="v1.9.3"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.9.3">v1.9.3</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.9.2/admin/tool/health/index.php"
                 data-name="v1.9.2"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.9.2">v1.9.2</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.9.1/admin/tool/health/index.php"
                 data-name="v1.9.1"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.9.1">v1.9.1</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.9.0/admin/tool/health/index.php"
                 data-name="v1.9.0"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.9.0">v1.9.0</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.8.14/admin/tool/health/index.php"
                 data-name="v1.8.14"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.8.14">v1.8.14</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.8.13/admin/tool/health/index.php"
                 data-name="v1.8.13"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.8.13">v1.8.13</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.8.12/admin/tool/health/index.php"
                 data-name="v1.8.12"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.8.12">v1.8.12</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.8.11/admin/tool/health/index.php"
                 data-name="v1.8.11"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.8.11">v1.8.11</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.8.10/admin/tool/health/index.php"
                 data-name="v1.8.10"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.8.10">v1.8.10</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.8.9/admin/tool/health/index.php"
                 data-name="v1.8.9"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.8.9">v1.8.9</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.8.8/admin/tool/health/index.php"
                 data-name="v1.8.8"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.8.8">v1.8.8</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.8.7/admin/tool/health/index.php"
                 data-name="v1.8.7"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.8.7">v1.8.7</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.8.6/admin/tool/health/index.php"
                 data-name="v1.8.6"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.8.6">v1.8.6</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.8.5/admin/tool/health/index.php"
                 data-name="v1.8.5"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.8.5">v1.8.5</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.8.4/admin/tool/health/index.php"
                 data-name="v1.8.4"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.8.4">v1.8.4</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.8.3/admin/tool/health/index.php"
                 data-name="v1.8.3"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.8.3">v1.8.3</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.8.2/admin/tool/health/index.php"
                 data-name="v1.8.2"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.8.2">v1.8.2</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.8.1/admin/tool/health/index.php"
                 data-name="v1.8.1"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.8.1">v1.8.1</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.8.0/admin/tool/health/index.php"
                 data-name="v1.8.0"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.8.0">v1.8.0</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.7.7/admin/tool/health/index.php"
                 data-name="v1.7.7"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.7.7">v1.7.7</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.7.6/admin/tool/health/index.php"
                 data-name="v1.7.6"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.7.6">v1.7.6</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.7.5/admin/tool/health/index.php"
                 data-name="v1.7.5"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.7.5">v1.7.5</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.7.4/admin/tool/health/index.php"
                 data-name="v1.7.4"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.7.4">v1.7.4</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.7.3/admin/tool/health/index.php"
                 data-name="v1.7.3"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.7.3">v1.7.3</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.7.2/admin/tool/health/index.php"
                 data-name="v1.7.2"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.7.2">v1.7.2</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.7.1/admin/tool/health/index.php"
                 data-name="v1.7.1"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.7.1">v1.7.1</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.7.0/admin/tool/health/index.php"
                 data-name="v1.7.0"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.7.0">v1.7.0</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.6.9/admin/tool/health/index.php"
                 data-name="v1.6.9"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.6.9">v1.6.9</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.6.8/admin/tool/health/index.php"
                 data-name="v1.6.8"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.6.8">v1.6.8</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.6.7/admin/tool/health/index.php"
                 data-name="v1.6.7"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.6.7">v1.6.7</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.6.6/admin/tool/health/index.php"
                 data-name="v1.6.6"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.6.6">v1.6.6</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.6.5/admin/tool/health/index.php"
                 data-name="v1.6.5"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.6.5">v1.6.5</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.6.4/admin/tool/health/index.php"
                 data-name="v1.6.4"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.6.4">v1.6.4</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.6.3/admin/tool/health/index.php"
                 data-name="v1.6.3"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.6.3">v1.6.3</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.6.2/admin/tool/health/index.php"
                 data-name="v1.6.2"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.6.2">v1.6.2</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.6.1/admin/tool/health/index.php"
                 data-name="v1.6.1"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.6.1">v1.6.1</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.6.0/admin/tool/health/index.php"
                 data-name="v1.6.0"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.6.0">v1.6.0</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.5.4/admin/tool/health/index.php"
                 data-name="v1.5.4"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.5.4">v1.5.4</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.5.3/admin/tool/health/index.php"
                 data-name="v1.5.3"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.5.3">v1.5.3</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.5.2/admin/tool/health/index.php"
                 data-name="v1.5.2"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.5.2">v1.5.2</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.5.1/admin/tool/health/index.php"
                 data-name="v1.5.1"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.5.1">v1.5.1</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.5.0/admin/tool/health/index.php"
                 data-name="v1.5.0"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.5.0">v1.5.0</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.4.5/admin/tool/health/index.php"
                 data-name="v1.4.5"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.4.5">v1.4.5</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.4.4/admin/tool/health/index.php"
                 data-name="v1.4.4"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.4.4">v1.4.4</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.4.3/admin/tool/health/index.php"
                 data-name="v1.4.3"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.4.3">v1.4.3</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.4.2/admin/tool/health/index.php"
                 data-name="v1.4.2"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.4.2">v1.4.2</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.4.1/admin/tool/health/index.php"
                 data-name="v1.4.1"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.4.1">v1.4.1</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.4.0/admin/tool/health/index.php"
                 data-name="v1.4.0"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.4.0">v1.4.0</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.3.5/admin/tool/health/index.php"
                 data-name="v1.3.5"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.3.5">v1.3.5</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.3.4/admin/tool/health/index.php"
                 data-name="v1.3.4"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.3.4">v1.3.4</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.3.3/admin/tool/health/index.php"
                 data-name="v1.3.3"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.3.3">v1.3.3</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.3.2/admin/tool/health/index.php"
                 data-name="v1.3.2"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.3.2">v1.3.2</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.3.1/admin/tool/health/index.php"
                 data-name="v1.3.1"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.3.1">v1.3.1</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.3.0/admin/tool/health/index.php"
                 data-name="v1.3.0"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.3.0">v1.3.0</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.2.1/admin/tool/health/index.php"
                 data-name="v1.2.1"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.2.1">v1.2.1</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.2.0/admin/tool/health/index.php"
                 data-name="v1.2.0"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.2.0">v1.2.0</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.1.1/admin/tool/health/index.php"
                 data-name="v1.1.1"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.1.1">v1.1.1</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.1.0/admin/tool/health/index.php"
                 data-name="v1.1.0"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.1.0">v1.1.0</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.0.9/admin/tool/health/index.php"
                 data-name="v1.0.9"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.0.9">v1.0.9</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.0.8/admin/tool/health/index.php"
                 data-name="v1.0.8"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.0.8">v1.0.8</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.0.7/admin/tool/health/index.php"
                 data-name="v1.0.7"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.0.7">v1.0.7</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.0.6/admin/tool/health/index.php"
                 data-name="v1.0.6"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.0.6">v1.0.6</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.0.5/admin/tool/health/index.php"
                 data-name="v1.0.5"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.0.5">v1.0.5</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.0.4/admin/tool/health/index.php"
                 data-name="v1.0.4"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.0.4">v1.0.4</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.0.3/admin/tool/health/index.php"
                 data-name="v1.0.3"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.0.3">v1.0.3</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.0.2/admin/tool/health/index.php"
                 data-name="v1.0.2"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.0.2">v1.0.2</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.0.1/admin/tool/health/index.php"
                 data-name="v1.0.1"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.0.1">v1.0.1</a>
            </div> <!-- /.select-menu-item -->
            <div class="select-menu-item js-navigation-item ">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/logan-reynolds/moodle/tree/v1.0.0/admin/tool/health/index.php"
                 data-name="v1.0.0"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="v1.0.0">v1.0.0</a>
            </div> <!-- /.select-menu-item -->
        </div>

        <div class="select-menu-no-results">Nothing to show</div>
      </div> <!-- /.select-menu-list -->

    </div> <!-- /.select-menu-modal -->
  </div> <!-- /.select-menu-modal-holder -->
</div> <!-- /.select-menu -->

  <div class="breadcrumb">
    <span class='repo-root js-repo-root'><span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/logan-reynolds/moodle/tree/wip_MDL-34684_2.4_corruptedcategories" data-branch="wip_MDL-34684_2.4_corruptedcategories" data-direction="back" data-pjax="true" itemscope="url"><span itemprop="title">moodle</span></a></span></span><span class="separator"> / </span><span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/logan-reynolds/moodle/tree/wip_MDL-34684_2.4_corruptedcategories/admin" data-branch="wip_MDL-34684_2.4_corruptedcategories" data-direction="back" data-pjax="true" itemscope="url"><span itemprop="title">admin</span></a></span><span class="separator"> / </span><span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/logan-reynolds/moodle/tree/wip_MDL-34684_2.4_corruptedcategories/admin/tool" data-branch="wip_MDL-34684_2.4_corruptedcategories" data-direction="back" data-pjax="true" itemscope="url"><span itemprop="title">tool</span></a></span><span class="separator"> / </span><span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/logan-reynolds/moodle/tree/wip_MDL-34684_2.4_corruptedcategories/admin/tool/health" data-branch="wip_MDL-34684_2.4_corruptedcategories" data-direction="back" data-pjax="true" itemscope="url"><span itemprop="title">health</span></a></span><span class="separator"> / </span><strong class="final-path">index.php</strong> <span class="js-zeroclipboard minibutton zeroclipboard-button" data-clipboard-text="admin/tool/health/index.php" data-copied-hint="copied!" title="copy to clipboard"><span class="octicon octicon-clippy"></span></span>
  </div>
</div>


  <div class="commit commit-loader file-history-tease js-deferred-content" data-url="/logan-reynolds/moodle/contributors/wip_MDL-34684_2.4_corruptedcategories/admin/tool/health/index.php">
    Fetching contributors…

    <div class="participation">
      <p class="loader-loading"><img alt="Octocat-spinner-32-eaf2f5" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32-EAF2F5.gif" width="16" /></p>
      <p class="loader-error">Cannot retrieve contributors at this time</p>
    </div>
  </div>

<div id="files" class="bubble">
  <div class="file">
    <div class="meta">
      <div class="info">
        <span class="icon"><b class="octicon octicon-file-text"></b></span>
        <span class="mode" title="File Mode">file</span>
          <span>815 lines (740 sloc)</span>
        <span>34.197 kb</span>
      </div>
      <div class="actions">
        <div class="button-group">
            <a class="minibutton tooltipped leftwards"
               href="http://windows.github.com" title="Open this file in GitHub for Windows">
                <span class="octicon octicon-device-desktop"></span> Open
            </a>
              <a class="minibutton disabled js-entice" href=""
                 data-entice="You must be signed in to make or propose changes">Edit</a>
          <a href="/logan-reynolds/moodle/raw/wip_MDL-34684_2.4_corruptedcategories/admin/tool/health/index.php" class="button minibutton " id="raw-url">Raw</a>
            <a href="/logan-reynolds/moodle/blame/wip_MDL-34684_2.4_corruptedcategories/admin/tool/health/index.php" class="button minibutton ">Blame</a>
          <a href="/logan-reynolds/moodle/commits/wip_MDL-34684_2.4_corruptedcategories/admin/tool/health/index.php" class="button minibutton " rel="nofollow">History</a>
        </div><!-- /.button-group -->
          <a class="minibutton danger empty-icon js-entice" href=""
             data-entice="You must be signed in and on a branch to make or propose changes">
          Delete
        </a>
      </div><!-- /.actions -->

    </div>
        <div class="blob-wrapper data type-php js-blob-data">
        <table class="file-code file-diff">
          <tr class="file-code-line">
            <td class="blob-line-nums">
              <span id="L1" rel="#L1">1</span>
<span id="L2" rel="#L2">2</span>
<span id="L3" rel="#L3">3</span>
<span id="L4" rel="#L4">4</span>
<span id="L5" rel="#L5">5</span>
<span id="L6" rel="#L6">6</span>
<span id="L7" rel="#L7">7</span>
<span id="L8" rel="#L8">8</span>
<span id="L9" rel="#L9">9</span>
<span id="L10" rel="#L10">10</span>
<span id="L11" rel="#L11">11</span>
<span id="L12" rel="#L12">12</span>
<span id="L13" rel="#L13">13</span>
<span id="L14" rel="#L14">14</span>
<span id="L15" rel="#L15">15</span>
<span id="L16" rel="#L16">16</span>
<span id="L17" rel="#L17">17</span>
<span id="L18" rel="#L18">18</span>
<span id="L19" rel="#L19">19</span>
<span id="L20" rel="#L20">20</span>
<span id="L21" rel="#L21">21</span>
<span id="L22" rel="#L22">22</span>
<span id="L23" rel="#L23">23</span>
<span id="L24" rel="#L24">24</span>
<span id="L25" rel="#L25">25</span>
<span id="L26" rel="#L26">26</span>
<span id="L27" rel="#L27">27</span>
<span id="L28" rel="#L28">28</span>
<span id="L29" rel="#L29">29</span>
<span id="L30" rel="#L30">30</span>
<span id="L31" rel="#L31">31</span>
<span id="L32" rel="#L32">32</span>
<span id="L33" rel="#L33">33</span>
<span id="L34" rel="#L34">34</span>
<span id="L35" rel="#L35">35</span>
<span id="L36" rel="#L36">36</span>
<span id="L37" rel="#L37">37</span>
<span id="L38" rel="#L38">38</span>
<span id="L39" rel="#L39">39</span>
<span id="L40" rel="#L40">40</span>
<span id="L41" rel="#L41">41</span>
<span id="L42" rel="#L42">42</span>
<span id="L43" rel="#L43">43</span>
<span id="L44" rel="#L44">44</span>
<span id="L45" rel="#L45">45</span>
<span id="L46" rel="#L46">46</span>
<span id="L47" rel="#L47">47</span>
<span id="L48" rel="#L48">48</span>
<span id="L49" rel="#L49">49</span>
<span id="L50" rel="#L50">50</span>
<span id="L51" rel="#L51">51</span>
<span id="L52" rel="#L52">52</span>
<span id="L53" rel="#L53">53</span>
<span id="L54" rel="#L54">54</span>
<span id="L55" rel="#L55">55</span>
<span id="L56" rel="#L56">56</span>
<span id="L57" rel="#L57">57</span>
<span id="L58" rel="#L58">58</span>
<span id="L59" rel="#L59">59</span>
<span id="L60" rel="#L60">60</span>
<span id="L61" rel="#L61">61</span>
<span id="L62" rel="#L62">62</span>
<span id="L63" rel="#L63">63</span>
<span id="L64" rel="#L64">64</span>
<span id="L65" rel="#L65">65</span>
<span id="L66" rel="#L66">66</span>
<span id="L67" rel="#L67">67</span>
<span id="L68" rel="#L68">68</span>
<span id="L69" rel="#L69">69</span>
<span id="L70" rel="#L70">70</span>
<span id="L71" rel="#L71">71</span>
<span id="L72" rel="#L72">72</span>
<span id="L73" rel="#L73">73</span>
<span id="L74" rel="#L74">74</span>
<span id="L75" rel="#L75">75</span>
<span id="L76" rel="#L76">76</span>
<span id="L77" rel="#L77">77</span>
<span id="L78" rel="#L78">78</span>
<span id="L79" rel="#L79">79</span>
<span id="L80" rel="#L80">80</span>
<span id="L81" rel="#L81">81</span>
<span id="L82" rel="#L82">82</span>
<span id="L83" rel="#L83">83</span>
<span id="L84" rel="#L84">84</span>
<span id="L85" rel="#L85">85</span>
<span id="L86" rel="#L86">86</span>
<span id="L87" rel="#L87">87</span>
<span id="L88" rel="#L88">88</span>
<span id="L89" rel="#L89">89</span>
<span id="L90" rel="#L90">90</span>
<span id="L91" rel="#L91">91</span>
<span id="L92" rel="#L92">92</span>
<span id="L93" rel="#L93">93</span>
<span id="L94" rel="#L94">94</span>
<span id="L95" rel="#L95">95</span>
<span id="L96" rel="#L96">96</span>
<span id="L97" rel="#L97">97</span>
<span id="L98" rel="#L98">98</span>
<span id="L99" rel="#L99">99</span>
<span id="L100" rel="#L100">100</span>
<span id="L101" rel="#L101">101</span>
<span id="L102" rel="#L102">102</span>
<span id="L103" rel="#L103">103</span>
<span id="L104" rel="#L104">104</span>
<span id="L105" rel="#L105">105</span>
<span id="L106" rel="#L106">106</span>
<span id="L107" rel="#L107">107</span>
<span id="L108" rel="#L108">108</span>
<span id="L109" rel="#L109">109</span>
<span id="L110" rel="#L110">110</span>
<span id="L111" rel="#L111">111</span>
<span id="L112" rel="#L112">112</span>
<span id="L113" rel="#L113">113</span>
<span id="L114" rel="#L114">114</span>
<span id="L115" rel="#L115">115</span>
<span id="L116" rel="#L116">116</span>
<span id="L117" rel="#L117">117</span>
<span id="L118" rel="#L118">118</span>
<span id="L119" rel="#L119">119</span>
<span id="L120" rel="#L120">120</span>
<span id="L121" rel="#L121">121</span>
<span id="L122" rel="#L122">122</span>
<span id="L123" rel="#L123">123</span>
<span id="L124" rel="#L124">124</span>
<span id="L125" rel="#L125">125</span>
<span id="L126" rel="#L126">126</span>
<span id="L127" rel="#L127">127</span>
<span id="L128" rel="#L128">128</span>
<span id="L129" rel="#L129">129</span>
<span id="L130" rel="#L130">130</span>
<span id="L131" rel="#L131">131</span>
<span id="L132" rel="#L132">132</span>
<span id="L133" rel="#L133">133</span>
<span id="L134" rel="#L134">134</span>
<span id="L135" rel="#L135">135</span>
<span id="L136" rel="#L136">136</span>
<span id="L137" rel="#L137">137</span>
<span id="L138" rel="#L138">138</span>
<span id="L139" rel="#L139">139</span>
<span id="L140" rel="#L140">140</span>
<span id="L141" rel="#L141">141</span>
<span id="L142" rel="#L142">142</span>
<span id="L143" rel="#L143">143</span>
<span id="L144" rel="#L144">144</span>
<span id="L145" rel="#L145">145</span>
<span id="L146" rel="#L146">146</span>
<span id="L147" rel="#L147">147</span>
<span id="L148" rel="#L148">148</span>
<span id="L149" rel="#L149">149</span>
<span id="L150" rel="#L150">150</span>
<span id="L151" rel="#L151">151</span>
<span id="L152" rel="#L152">152</span>
<span id="L153" rel="#L153">153</span>
<span id="L154" rel="#L154">154</span>
<span id="L155" rel="#L155">155</span>
<span id="L156" rel="#L156">156</span>
<span id="L157" rel="#L157">157</span>
<span id="L158" rel="#L158">158</span>
<span id="L159" rel="#L159">159</span>
<span id="L160" rel="#L160">160</span>
<span id="L161" rel="#L161">161</span>
<span id="L162" rel="#L162">162</span>
<span id="L163" rel="#L163">163</span>
<span id="L164" rel="#L164">164</span>
<span id="L165" rel="#L165">165</span>
<span id="L166" rel="#L166">166</span>
<span id="L167" rel="#L167">167</span>
<span id="L168" rel="#L168">168</span>
<span id="L169" rel="#L169">169</span>
<span id="L170" rel="#L170">170</span>
<span id="L171" rel="#L171">171</span>
<span id="L172" rel="#L172">172</span>
<span id="L173" rel="#L173">173</span>
<span id="L174" rel="#L174">174</span>
<span id="L175" rel="#L175">175</span>
<span id="L176" rel="#L176">176</span>
<span id="L177" rel="#L177">177</span>
<span id="L178" rel="#L178">178</span>
<span id="L179" rel="#L179">179</span>
<span id="L180" rel="#L180">180</span>
<span id="L181" rel="#L181">181</span>
<span id="L182" rel="#L182">182</span>
<span id="L183" rel="#L183">183</span>
<span id="L184" rel="#L184">184</span>
<span id="L185" rel="#L185">185</span>
<span id="L186" rel="#L186">186</span>
<span id="L187" rel="#L187">187</span>
<span id="L188" rel="#L188">188</span>
<span id="L189" rel="#L189">189</span>
<span id="L190" rel="#L190">190</span>
<span id="L191" rel="#L191">191</span>
<span id="L192" rel="#L192">192</span>
<span id="L193" rel="#L193">193</span>
<span id="L194" rel="#L194">194</span>
<span id="L195" rel="#L195">195</span>
<span id="L196" rel="#L196">196</span>
<span id="L197" rel="#L197">197</span>
<span id="L198" rel="#L198">198</span>
<span id="L199" rel="#L199">199</span>
<span id="L200" rel="#L200">200</span>
<span id="L201" rel="#L201">201</span>
<span id="L202" rel="#L202">202</span>
<span id="L203" rel="#L203">203</span>
<span id="L204" rel="#L204">204</span>
<span id="L205" rel="#L205">205</span>
<span id="L206" rel="#L206">206</span>
<span id="L207" rel="#L207">207</span>
<span id="L208" rel="#L208">208</span>
<span id="L209" rel="#L209">209</span>
<span id="L210" rel="#L210">210</span>
<span id="L211" rel="#L211">211</span>
<span id="L212" rel="#L212">212</span>
<span id="L213" rel="#L213">213</span>
<span id="L214" rel="#L214">214</span>
<span id="L215" rel="#L215">215</span>
<span id="L216" rel="#L216">216</span>
<span id="L217" rel="#L217">217</span>
<span id="L218" rel="#L218">218</span>
<span id="L219" rel="#L219">219</span>
<span id="L220" rel="#L220">220</span>
<span id="L221" rel="#L221">221</span>
<span id="L222" rel="#L222">222</span>
<span id="L223" rel="#L223">223</span>
<span id="L224" rel="#L224">224</span>
<span id="L225" rel="#L225">225</span>
<span id="L226" rel="#L226">226</span>
<span id="L227" rel="#L227">227</span>
<span id="L228" rel="#L228">228</span>
<span id="L229" rel="#L229">229</span>
<span id="L230" rel="#L230">230</span>
<span id="L231" rel="#L231">231</span>
<span id="L232" rel="#L232">232</span>
<span id="L233" rel="#L233">233</span>
<span id="L234" rel="#L234">234</span>
<span id="L235" rel="#L235">235</span>
<span id="L236" rel="#L236">236</span>
<span id="L237" rel="#L237">237</span>
<span id="L238" rel="#L238">238</span>
<span id="L239" rel="#L239">239</span>
<span id="L240" rel="#L240">240</span>
<span id="L241" rel="#L241">241</span>
<span id="L242" rel="#L242">242</span>
<span id="L243" rel="#L243">243</span>
<span id="L244" rel="#L244">244</span>
<span id="L245" rel="#L245">245</span>
<span id="L246" rel="#L246">246</span>
<span id="L247" rel="#L247">247</span>
<span id="L248" rel="#L248">248</span>
<span id="L249" rel="#L249">249</span>
<span id="L250" rel="#L250">250</span>
<span id="L251" rel="#L251">251</span>
<span id="L252" rel="#L252">252</span>
<span id="L253" rel="#L253">253</span>
<span id="L254" rel="#L254">254</span>
<span id="L255" rel="#L255">255</span>
<span id="L256" rel="#L256">256</span>
<span id="L257" rel="#L257">257</span>
<span id="L258" rel="#L258">258</span>
<span id="L259" rel="#L259">259</span>
<span id="L260" rel="#L260">260</span>
<span id="L261" rel="#L261">261</span>
<span id="L262" rel="#L262">262</span>
<span id="L263" rel="#L263">263</span>
<span id="L264" rel="#L264">264</span>
<span id="L265" rel="#L265">265</span>
<span id="L266" rel="#L266">266</span>
<span id="L267" rel="#L267">267</span>
<span id="L268" rel="#L268">268</span>
<span id="L269" rel="#L269">269</span>
<span id="L270" rel="#L270">270</span>
<span id="L271" rel="#L271">271</span>
<span id="L272" rel="#L272">272</span>
<span id="L273" rel="#L273">273</span>
<span id="L274" rel="#L274">274</span>
<span id="L275" rel="#L275">275</span>
<span id="L276" rel="#L276">276</span>
<span id="L277" rel="#L277">277</span>
<span id="L278" rel="#L278">278</span>
<span id="L279" rel="#L279">279</span>
<span id="L280" rel="#L280">280</span>
<span id="L281" rel="#L281">281</span>
<span id="L282" rel="#L282">282</span>
<span id="L283" rel="#L283">283</span>
<span id="L284" rel="#L284">284</span>
<span id="L285" rel="#L285">285</span>
<span id="L286" rel="#L286">286</span>
<span id="L287" rel="#L287">287</span>
<span id="L288" rel="#L288">288</span>
<span id="L289" rel="#L289">289</span>
<span id="L290" rel="#L290">290</span>
<span id="L291" rel="#L291">291</span>
<span id="L292" rel="#L292">292</span>
<span id="L293" rel="#L293">293</span>
<span id="L294" rel="#L294">294</span>
<span id="L295" rel="#L295">295</span>
<span id="L296" rel="#L296">296</span>
<span id="L297" rel="#L297">297</span>
<span id="L298" rel="#L298">298</span>
<span id="L299" rel="#L299">299</span>
<span id="L300" rel="#L300">300</span>
<span id="L301" rel="#L301">301</span>
<span id="L302" rel="#L302">302</span>
<span id="L303" rel="#L303">303</span>
<span id="L304" rel="#L304">304</span>
<span id="L305" rel="#L305">305</span>
<span id="L306" rel="#L306">306</span>
<span id="L307" rel="#L307">307</span>
<span id="L308" rel="#L308">308</span>
<span id="L309" rel="#L309">309</span>
<span id="L310" rel="#L310">310</span>
<span id="L311" rel="#L311">311</span>
<span id="L312" rel="#L312">312</span>
<span id="L313" rel="#L313">313</span>
<span id="L314" rel="#L314">314</span>
<span id="L315" rel="#L315">315</span>
<span id="L316" rel="#L316">316</span>
<span id="L317" rel="#L317">317</span>
<span id="L318" rel="#L318">318</span>
<span id="L319" rel="#L319">319</span>
<span id="L320" rel="#L320">320</span>
<span id="L321" rel="#L321">321</span>
<span id="L322" rel="#L322">322</span>
<span id="L323" rel="#L323">323</span>
<span id="L324" rel="#L324">324</span>
<span id="L325" rel="#L325">325</span>
<span id="L326" rel="#L326">326</span>
<span id="L327" rel="#L327">327</span>
<span id="L328" rel="#L328">328</span>
<span id="L329" rel="#L329">329</span>
<span id="L330" rel="#L330">330</span>
<span id="L331" rel="#L331">331</span>
<span id="L332" rel="#L332">332</span>
<span id="L333" rel="#L333">333</span>
<span id="L334" rel="#L334">334</span>
<span id="L335" rel="#L335">335</span>
<span id="L336" rel="#L336">336</span>
<span id="L337" rel="#L337">337</span>
<span id="L338" rel="#L338">338</span>
<span id="L339" rel="#L339">339</span>
<span id="L340" rel="#L340">340</span>
<span id="L341" rel="#L341">341</span>
<span id="L342" rel="#L342">342</span>
<span id="L343" rel="#L343">343</span>
<span id="L344" rel="#L344">344</span>
<span id="L345" rel="#L345">345</span>
<span id="L346" rel="#L346">346</span>
<span id="L347" rel="#L347">347</span>
<span id="L348" rel="#L348">348</span>
<span id="L349" rel="#L349">349</span>
<span id="L350" rel="#L350">350</span>
<span id="L351" rel="#L351">351</span>
<span id="L352" rel="#L352">352</span>
<span id="L353" rel="#L353">353</span>
<span id="L354" rel="#L354">354</span>
<span id="L355" rel="#L355">355</span>
<span id="L356" rel="#L356">356</span>
<span id="L357" rel="#L357">357</span>
<span id="L358" rel="#L358">358</span>
<span id="L359" rel="#L359">359</span>
<span id="L360" rel="#L360">360</span>
<span id="L361" rel="#L361">361</span>
<span id="L362" rel="#L362">362</span>
<span id="L363" rel="#L363">363</span>
<span id="L364" rel="#L364">364</span>
<span id="L365" rel="#L365">365</span>
<span id="L366" rel="#L366">366</span>
<span id="L367" rel="#L367">367</span>
<span id="L368" rel="#L368">368</span>
<span id="L369" rel="#L369">369</span>
<span id="L370" rel="#L370">370</span>
<span id="L371" rel="#L371">371</span>
<span id="L372" rel="#L372">372</span>
<span id="L373" rel="#L373">373</span>
<span id="L374" rel="#L374">374</span>
<span id="L375" rel="#L375">375</span>
<span id="L376" rel="#L376">376</span>
<span id="L377" rel="#L377">377</span>
<span id="L378" rel="#L378">378</span>
<span id="L379" rel="#L379">379</span>
<span id="L380" rel="#L380">380</span>
<span id="L381" rel="#L381">381</span>
<span id="L382" rel="#L382">382</span>
<span id="L383" rel="#L383">383</span>
<span id="L384" rel="#L384">384</span>
<span id="L385" rel="#L385">385</span>
<span id="L386" rel="#L386">386</span>
<span id="L387" rel="#L387">387</span>
<span id="L388" rel="#L388">388</span>
<span id="L389" rel="#L389">389</span>
<span id="L390" rel="#L390">390</span>
<span id="L391" rel="#L391">391</span>
<span id="L392" rel="#L392">392</span>
<span id="L393" rel="#L393">393</span>
<span id="L394" rel="#L394">394</span>
<span id="L395" rel="#L395">395</span>
<span id="L396" rel="#L396">396</span>
<span id="L397" rel="#L397">397</span>
<span id="L398" rel="#L398">398</span>
<span id="L399" rel="#L399">399</span>
<span id="L400" rel="#L400">400</span>
<span id="L401" rel="#L401">401</span>
<span id="L402" rel="#L402">402</span>
<span id="L403" rel="#L403">403</span>
<span id="L404" rel="#L404">404</span>
<span id="L405" rel="#L405">405</span>
<span id="L406" rel="#L406">406</span>
<span id="L407" rel="#L407">407</span>
<span id="L408" rel="#L408">408</span>
<span id="L409" rel="#L409">409</span>
<span id="L410" rel="#L410">410</span>
<span id="L411" rel="#L411">411</span>
<span id="L412" rel="#L412">412</span>
<span id="L413" rel="#L413">413</span>
<span id="L414" rel="#L414">414</span>
<span id="L415" rel="#L415">415</span>
<span id="L416" rel="#L416">416</span>
<span id="L417" rel="#L417">417</span>
<span id="L418" rel="#L418">418</span>
<span id="L419" rel="#L419">419</span>
<span id="L420" rel="#L420">420</span>
<span id="L421" rel="#L421">421</span>
<span id="L422" rel="#L422">422</span>
<span id="L423" rel="#L423">423</span>
<span id="L424" rel="#L424">424</span>
<span id="L425" rel="#L425">425</span>
<span id="L426" rel="#L426">426</span>
<span id="L427" rel="#L427">427</span>
<span id="L428" rel="#L428">428</span>
<span id="L429" rel="#L429">429</span>
<span id="L430" rel="#L430">430</span>
<span id="L431" rel="#L431">431</span>
<span id="L432" rel="#L432">432</span>
<span id="L433" rel="#L433">433</span>
<span id="L434" rel="#L434">434</span>
<span id="L435" rel="#L435">435</span>
<span id="L436" rel="#L436">436</span>
<span id="L437" rel="#L437">437</span>
<span id="L438" rel="#L438">438</span>
<span id="L439" rel="#L439">439</span>
<span id="L440" rel="#L440">440</span>
<span id="L441" rel="#L441">441</span>
<span id="L442" rel="#L442">442</span>
<span id="L443" rel="#L443">443</span>
<span id="L444" rel="#L444">444</span>
<span id="L445" rel="#L445">445</span>
<span id="L446" rel="#L446">446</span>
<span id="L447" rel="#L447">447</span>
<span id="L448" rel="#L448">448</span>
<span id="L449" rel="#L449">449</span>
<span id="L450" rel="#L450">450</span>
<span id="L451" rel="#L451">451</span>
<span id="L452" rel="#L452">452</span>
<span id="L453" rel="#L453">453</span>
<span id="L454" rel="#L454">454</span>
<span id="L455" rel="#L455">455</span>
<span id="L456" rel="#L456">456</span>
<span id="L457" rel="#L457">457</span>
<span id="L458" rel="#L458">458</span>
<span id="L459" rel="#L459">459</span>
<span id="L460" rel="#L460">460</span>
<span id="L461" rel="#L461">461</span>
<span id="L462" rel="#L462">462</span>
<span id="L463" rel="#L463">463</span>
<span id="L464" rel="#L464">464</span>
<span id="L465" rel="#L465">465</span>
<span id="L466" rel="#L466">466</span>
<span id="L467" rel="#L467">467</span>
<span id="L468" rel="#L468">468</span>
<span id="L469" rel="#L469">469</span>
<span id="L470" rel="#L470">470</span>
<span id="L471" rel="#L471">471</span>
<span id="L472" rel="#L472">472</span>
<span id="L473" rel="#L473">473</span>
<span id="L474" rel="#L474">474</span>
<span id="L475" rel="#L475">475</span>
<span id="L476" rel="#L476">476</span>
<span id="L477" rel="#L477">477</span>
<span id="L478" rel="#L478">478</span>
<span id="L479" rel="#L479">479</span>
<span id="L480" rel="#L480">480</span>
<span id="L481" rel="#L481">481</span>
<span id="L482" rel="#L482">482</span>
<span id="L483" rel="#L483">483</span>
<span id="L484" rel="#L484">484</span>
<span id="L485" rel="#L485">485</span>
<span id="L486" rel="#L486">486</span>
<span id="L487" rel="#L487">487</span>
<span id="L488" rel="#L488">488</span>
<span id="L489" rel="#L489">489</span>
<span id="L490" rel="#L490">490</span>
<span id="L491" rel="#L491">491</span>
<span id="L492" rel="#L492">492</span>
<span id="L493" rel="#L493">493</span>
<span id="L494" rel="#L494">494</span>
<span id="L495" rel="#L495">495</span>
<span id="L496" rel="#L496">496</span>
<span id="L497" rel="#L497">497</span>
<span id="L498" rel="#L498">498</span>
<span id="L499" rel="#L499">499</span>
<span id="L500" rel="#L500">500</span>
<span id="L501" rel="#L501">501</span>
<span id="L502" rel="#L502">502</span>
<span id="L503" rel="#L503">503</span>
<span id="L504" rel="#L504">504</span>
<span id="L505" rel="#L505">505</span>
<span id="L506" rel="#L506">506</span>
<span id="L507" rel="#L507">507</span>
<span id="L508" rel="#L508">508</span>
<span id="L509" rel="#L509">509</span>
<span id="L510" rel="#L510">510</span>
<span id="L511" rel="#L511">511</span>
<span id="L512" rel="#L512">512</span>
<span id="L513" rel="#L513">513</span>
<span id="L514" rel="#L514">514</span>
<span id="L515" rel="#L515">515</span>
<span id="L516" rel="#L516">516</span>
<span id="L517" rel="#L517">517</span>
<span id="L518" rel="#L518">518</span>
<span id="L519" rel="#L519">519</span>
<span id="L520" rel="#L520">520</span>
<span id="L521" rel="#L521">521</span>
<span id="L522" rel="#L522">522</span>
<span id="L523" rel="#L523">523</span>
<span id="L524" rel="#L524">524</span>
<span id="L525" rel="#L525">525</span>
<span id="L526" rel="#L526">526</span>
<span id="L527" rel="#L527">527</span>
<span id="L528" rel="#L528">528</span>
<span id="L529" rel="#L529">529</span>
<span id="L530" rel="#L530">530</span>
<span id="L531" rel="#L531">531</span>
<span id="L532" rel="#L532">532</span>
<span id="L533" rel="#L533">533</span>
<span id="L534" rel="#L534">534</span>
<span id="L535" rel="#L535">535</span>
<span id="L536" rel="#L536">536</span>
<span id="L537" rel="#L537">537</span>
<span id="L538" rel="#L538">538</span>
<span id="L539" rel="#L539">539</span>
<span id="L540" rel="#L540">540</span>
<span id="L541" rel="#L541">541</span>
<span id="L542" rel="#L542">542</span>
<span id="L543" rel="#L543">543</span>
<span id="L544" rel="#L544">544</span>
<span id="L545" rel="#L545">545</span>
<span id="L546" rel="#L546">546</span>
<span id="L547" rel="#L547">547</span>
<span id="L548" rel="#L548">548</span>
<span id="L549" rel="#L549">549</span>
<span id="L550" rel="#L550">550</span>
<span id="L551" rel="#L551">551</span>
<span id="L552" rel="#L552">552</span>
<span id="L553" rel="#L553">553</span>
<span id="L554" rel="#L554">554</span>
<span id="L555" rel="#L555">555</span>
<span id="L556" rel="#L556">556</span>
<span id="L557" rel="#L557">557</span>
<span id="L558" rel="#L558">558</span>
<span id="L559" rel="#L559">559</span>
<span id="L560" rel="#L560">560</span>
<span id="L561" rel="#L561">561</span>
<span id="L562" rel="#L562">562</span>
<span id="L563" rel="#L563">563</span>
<span id="L564" rel="#L564">564</span>
<span id="L565" rel="#L565">565</span>
<span id="L566" rel="#L566">566</span>
<span id="L567" rel="#L567">567</span>
<span id="L568" rel="#L568">568</span>
<span id="L569" rel="#L569">569</span>
<span id="L570" rel="#L570">570</span>
<span id="L571" rel="#L571">571</span>
<span id="L572" rel="#L572">572</span>
<span id="L573" rel="#L573">573</span>
<span id="L574" rel="#L574">574</span>
<span id="L575" rel="#L575">575</span>
<span id="L576" rel="#L576">576</span>
<span id="L577" rel="#L577">577</span>
<span id="L578" rel="#L578">578</span>
<span id="L579" rel="#L579">579</span>
<span id="L580" rel="#L580">580</span>
<span id="L581" rel="#L581">581</span>
<span id="L582" rel="#L582">582</span>
<span id="L583" rel="#L583">583</span>
<span id="L584" rel="#L584">584</span>
<span id="L585" rel="#L585">585</span>
<span id="L586" rel="#L586">586</span>
<span id="L587" rel="#L587">587</span>
<span id="L588" rel="#L588">588</span>
<span id="L589" rel="#L589">589</span>
<span id="L590" rel="#L590">590</span>
<span id="L591" rel="#L591">591</span>
<span id="L592" rel="#L592">592</span>
<span id="L593" rel="#L593">593</span>
<span id="L594" rel="#L594">594</span>
<span id="L595" rel="#L595">595</span>
<span id="L596" rel="#L596">596</span>
<span id="L597" rel="#L597">597</span>
<span id="L598" rel="#L598">598</span>
<span id="L599" rel="#L599">599</span>
<span id="L600" rel="#L600">600</span>
<span id="L601" rel="#L601">601</span>
<span id="L602" rel="#L602">602</span>
<span id="L603" rel="#L603">603</span>
<span id="L604" rel="#L604">604</span>
<span id="L605" rel="#L605">605</span>
<span id="L606" rel="#L606">606</span>
<span id="L607" rel="#L607">607</span>
<span id="L608" rel="#L608">608</span>
<span id="L609" rel="#L609">609</span>
<span id="L610" rel="#L610">610</span>
<span id="L611" rel="#L611">611</span>
<span id="L612" rel="#L612">612</span>
<span id="L613" rel="#L613">613</span>
<span id="L614" rel="#L614">614</span>
<span id="L615" rel="#L615">615</span>
<span id="L616" rel="#L616">616</span>
<span id="L617" rel="#L617">617</span>
<span id="L618" rel="#L618">618</span>
<span id="L619" rel="#L619">619</span>
<span id="L620" rel="#L620">620</span>
<span id="L621" rel="#L621">621</span>
<span id="L622" rel="#L622">622</span>
<span id="L623" rel="#L623">623</span>
<span id="L624" rel="#L624">624</span>
<span id="L625" rel="#L625">625</span>
<span id="L626" rel="#L626">626</span>
<span id="L627" rel="#L627">627</span>
<span id="L628" rel="#L628">628</span>
<span id="L629" rel="#L629">629</span>
<span id="L630" rel="#L630">630</span>
<span id="L631" rel="#L631">631</span>
<span id="L632" rel="#L632">632</span>
<span id="L633" rel="#L633">633</span>
<span id="L634" rel="#L634">634</span>
<span id="L635" rel="#L635">635</span>
<span id="L636" rel="#L636">636</span>
<span id="L637" rel="#L637">637</span>
<span id="L638" rel="#L638">638</span>
<span id="L639" rel="#L639">639</span>
<span id="L640" rel="#L640">640</span>
<span id="L641" rel="#L641">641</span>
<span id="L642" rel="#L642">642</span>
<span id="L643" rel="#L643">643</span>
<span id="L644" rel="#L644">644</span>
<span id="L645" rel="#L645">645</span>
<span id="L646" rel="#L646">646</span>
<span id="L647" rel="#L647">647</span>
<span id="L648" rel="#L648">648</span>
<span id="L649" rel="#L649">649</span>
<span id="L650" rel="#L650">650</span>
<span id="L651" rel="#L651">651</span>
<span id="L652" rel="#L652">652</span>
<span id="L653" rel="#L653">653</span>
<span id="L654" rel="#L654">654</span>
<span id="L655" rel="#L655">655</span>
<span id="L656" rel="#L656">656</span>
<span id="L657" rel="#L657">657</span>
<span id="L658" rel="#L658">658</span>
<span id="L659" rel="#L659">659</span>
<span id="L660" rel="#L660">660</span>
<span id="L661" rel="#L661">661</span>
<span id="L662" rel="#L662">662</span>
<span id="L663" rel="#L663">663</span>
<span id="L664" rel="#L664">664</span>
<span id="L665" rel="#L665">665</span>
<span id="L666" rel="#L666">666</span>
<span id="L667" rel="#L667">667</span>
<span id="L668" rel="#L668">668</span>
<span id="L669" rel="#L669">669</span>
<span id="L670" rel="#L670">670</span>
<span id="L671" rel="#L671">671</span>
<span id="L672" rel="#L672">672</span>
<span id="L673" rel="#L673">673</span>
<span id="L674" rel="#L674">674</span>
<span id="L675" rel="#L675">675</span>
<span id="L676" rel="#L676">676</span>
<span id="L677" rel="#L677">677</span>
<span id="L678" rel="#L678">678</span>
<span id="L679" rel="#L679">679</span>
<span id="L680" rel="#L680">680</span>
<span id="L681" rel="#L681">681</span>
<span id="L682" rel="#L682">682</span>
<span id="L683" rel="#L683">683</span>
<span id="L684" rel="#L684">684</span>
<span id="L685" rel="#L685">685</span>
<span id="L686" rel="#L686">686</span>
<span id="L687" rel="#L687">687</span>
<span id="L688" rel="#L688">688</span>
<span id="L689" rel="#L689">689</span>
<span id="L690" rel="#L690">690</span>
<span id="L691" rel="#L691">691</span>
<span id="L692" rel="#L692">692</span>
<span id="L693" rel="#L693">693</span>
<span id="L694" rel="#L694">694</span>
<span id="L695" rel="#L695">695</span>
<span id="L696" rel="#L696">696</span>
<span id="L697" rel="#L697">697</span>
<span id="L698" rel="#L698">698</span>
<span id="L699" rel="#L699">699</span>
<span id="L700" rel="#L700">700</span>
<span id="L701" rel="#L701">701</span>
<span id="L702" rel="#L702">702</span>
<span id="L703" rel="#L703">703</span>
<span id="L704" rel="#L704">704</span>
<span id="L705" rel="#L705">705</span>
<span id="L706" rel="#L706">706</span>
<span id="L707" rel="#L707">707</span>
<span id="L708" rel="#L708">708</span>
<span id="L709" rel="#L709">709</span>
<span id="L710" rel="#L710">710</span>
<span id="L711" rel="#L711">711</span>
<span id="L712" rel="#L712">712</span>
<span id="L713" rel="#L713">713</span>
<span id="L714" rel="#L714">714</span>
<span id="L715" rel="#L715">715</span>
<span id="L716" rel="#L716">716</span>
<span id="L717" rel="#L717">717</span>
<span id="L718" rel="#L718">718</span>
<span id="L719" rel="#L719">719</span>
<span id="L720" rel="#L720">720</span>
<span id="L721" rel="#L721">721</span>
<span id="L722" rel="#L722">722</span>
<span id="L723" rel="#L723">723</span>
<span id="L724" rel="#L724">724</span>
<span id="L725" rel="#L725">725</span>
<span id="L726" rel="#L726">726</span>
<span id="L727" rel="#L727">727</span>
<span id="L728" rel="#L728">728</span>
<span id="L729" rel="#L729">729</span>
<span id="L730" rel="#L730">730</span>
<span id="L731" rel="#L731">731</span>
<span id="L732" rel="#L732">732</span>
<span id="L733" rel="#L733">733</span>
<span id="L734" rel="#L734">734</span>
<span id="L735" rel="#L735">735</span>
<span id="L736" rel="#L736">736</span>
<span id="L737" rel="#L737">737</span>
<span id="L738" rel="#L738">738</span>
<span id="L739" rel="#L739">739</span>
<span id="L740" rel="#L740">740</span>
<span id="L741" rel="#L741">741</span>
<span id="L742" rel="#L742">742</span>
<span id="L743" rel="#L743">743</span>
<span id="L744" rel="#L744">744</span>
<span id="L745" rel="#L745">745</span>
<span id="L746" rel="#L746">746</span>
<span id="L747" rel="#L747">747</span>
<span id="L748" rel="#L748">748</span>
<span id="L749" rel="#L749">749</span>
<span id="L750" rel="#L750">750</span>
<span id="L751" rel="#L751">751</span>
<span id="L752" rel="#L752">752</span>
<span id="L753" rel="#L753">753</span>
<span id="L754" rel="#L754">754</span>
<span id="L755" rel="#L755">755</span>
<span id="L756" rel="#L756">756</span>
<span id="L757" rel="#L757">757</span>
<span id="L758" rel="#L758">758</span>
<span id="L759" rel="#L759">759</span>
<span id="L760" rel="#L760">760</span>
<span id="L761" rel="#L761">761</span>
<span id="L762" rel="#L762">762</span>
<span id="L763" rel="#L763">763</span>
<span id="L764" rel="#L764">764</span>
<span id="L765" rel="#L765">765</span>
<span id="L766" rel="#L766">766</span>
<span id="L767" rel="#L767">767</span>
<span id="L768" rel="#L768">768</span>
<span id="L769" rel="#L769">769</span>
<span id="L770" rel="#L770">770</span>
<span id="L771" rel="#L771">771</span>
<span id="L772" rel="#L772">772</span>
<span id="L773" rel="#L773">773</span>
<span id="L774" rel="#L774">774</span>
<span id="L775" rel="#L775">775</span>
<span id="L776" rel="#L776">776</span>
<span id="L777" rel="#L777">777</span>
<span id="L778" rel="#L778">778</span>
<span id="L779" rel="#L779">779</span>
<span id="L780" rel="#L780">780</span>
<span id="L781" rel="#L781">781</span>
<span id="L782" rel="#L782">782</span>
<span id="L783" rel="#L783">783</span>
<span id="L784" rel="#L784">784</span>
<span id="L785" rel="#L785">785</span>
<span id="L786" rel="#L786">786</span>
<span id="L787" rel="#L787">787</span>
<span id="L788" rel="#L788">788</span>
<span id="L789" rel="#L789">789</span>
<span id="L790" rel="#L790">790</span>
<span id="L791" rel="#L791">791</span>
<span id="L792" rel="#L792">792</span>
<span id="L793" rel="#L793">793</span>
<span id="L794" rel="#L794">794</span>
<span id="L795" rel="#L795">795</span>
<span id="L796" rel="#L796">796</span>
<span id="L797" rel="#L797">797</span>
<span id="L798" rel="#L798">798</span>
<span id="L799" rel="#L799">799</span>
<span id="L800" rel="#L800">800</span>
<span id="L801" rel="#L801">801</span>
<span id="L802" rel="#L802">802</span>
<span id="L803" rel="#L803">803</span>
<span id="L804" rel="#L804">804</span>
<span id="L805" rel="#L805">805</span>
<span id="L806" rel="#L806">806</span>
<span id="L807" rel="#L807">807</span>
<span id="L808" rel="#L808">808</span>
<span id="L809" rel="#L809">809</span>
<span id="L810" rel="#L810">810</span>
<span id="L811" rel="#L811">811</span>
<span id="L812" rel="#L812">812</span>
<span id="L813" rel="#L813">813</span>
<span id="L814" rel="#L814">814</span>

            </td>
            <td class="blob-line-code">
                    <div class="highlight"><pre><div class='line' id='LC1'><span class="o">&lt;?</span><span class="nx">php</span></div><div class='line' id='LC2'><span class="c1">// This file is part of Moodle - http://moodle.org/</span></div><div class='line' id='LC3'><span class="c1">//</span></div><div class='line' id='LC4'><span class="c1">// Moodle is free software: you can redistribute it and/or modify</span></div><div class='line' id='LC5'><span class="c1">// it under the terms of the GNU General Public License as published by</span></div><div class='line' id='LC6'><span class="c1">// the Free Software Foundation, either version 3 of the License, or</span></div><div class='line' id='LC7'><span class="c1">// (at your option) any later version.</span></div><div class='line' id='LC8'><span class="c1">//</span></div><div class='line' id='LC9'><span class="c1">// Moodle is distributed in the hope that it will be useful,</span></div><div class='line' id='LC10'><span class="c1">// but WITHOUT ANY WARRANTY; without even the implied warranty of</span></div><div class='line' id='LC11'><span class="c1">// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the</span></div><div class='line' id='LC12'><span class="c1">// GNU General Public License for more details.</span></div><div class='line' id='LC13'><span class="c1">//</span></div><div class='line' id='LC14'><span class="c1">// You should have received a copy of the GNU General Public License</span></div><div class='line' id='LC15'><span class="c1">// along with Moodle.  If not, see &lt;http://www.gnu.org/licenses/&gt;.</span></div><div class='line' id='LC16'><br/></div><div class='line' id='LC17'><span class="sd">/**</span></div><div class='line' id='LC18'><span class="sd"> * Strings for component &#39;tool_health&#39;, language &#39;en&#39;, branch &#39;MOODLE_22_STABLE&#39;</span></div><div class='line' id='LC19'><span class="sd"> *</span></div><div class='line' id='LC20'><span class="sd"> * @package    tool</span></div><div class='line' id='LC21'><span class="sd"> * @subpackage health</span></div><div class='line' id='LC22'><span class="sd"> * @copyright  1999 onwards Martin Dougiamas (http://dougiamas.com)</span></div><div class='line' id='LC23'><span class="sd"> * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later</span></div><div class='line' id='LC24'><span class="sd"> */</span></div><div class='line' id='LC25'><br/></div><div class='line' id='LC26'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nb">ob_start</span><span class="p">();</span> <span class="c1">//for whitespace test</span></div><div class='line' id='LC27'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">require</span><span class="p">(</span><span class="s1">&#39;../../../config.php&#39;</span><span class="p">);</span></div><div class='line' id='LC28'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$extraws</span> <span class="o">=</span> <span class="nb">ob_get_clean</span><span class="p">();</span></div><div class='line' id='LC29'><br/></div><div class='line' id='LC30'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">require_once</span><span class="p">(</span><span class="nv">$CFG</span><span class="o">-&gt;</span><span class="na">libdir</span><span class="o">.</span><span class="s1">&#39;/adminlib.php&#39;</span><span class="p">);</span></div><div class='line' id='LC31'><br/></div><div class='line' id='LC32'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">admin_externalpage_setup</span><span class="p">(</span><span class="s1">&#39;toolhealth&#39;</span><span class="p">);</span></div><div class='line' id='LC33'><br/></div><div class='line' id='LC34'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nb">define</span><span class="p">(</span><span class="s1">&#39;SEVERITY_NOTICE&#39;</span><span class="p">,</span>      <span class="s1">&#39;notice&#39;</span><span class="p">);</span></div><div class='line' id='LC35'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nb">define</span><span class="p">(</span><span class="s1">&#39;SEVERITY_ANNOYANCE&#39;</span><span class="p">,</span>   <span class="s1">&#39;annoyance&#39;</span><span class="p">);</span></div><div class='line' id='LC36'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nb">define</span><span class="p">(</span><span class="s1">&#39;SEVERITY_SIGNIFICANT&#39;</span><span class="p">,</span> <span class="s1">&#39;significant&#39;</span><span class="p">);</span></div><div class='line' id='LC37'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nb">define</span><span class="p">(</span><span class="s1">&#39;SEVERITY_CRITICAL&#39;</span><span class="p">,</span>    <span class="s1">&#39;critical&#39;</span><span class="p">);</span></div><div class='line' id='LC38'><br/></div><div class='line' id='LC39'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$solution</span> <span class="o">=</span> <span class="nx">optional_param</span><span class="p">(</span><span class="s1">&#39;solution&#39;</span><span class="p">,</span> <span class="mi">0</span><span class="p">,</span> <span class="nx">PARAM_PLUGIN</span><span class="p">);</span></div><div class='line' id='LC40'><br/></div><div class='line' id='LC41'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">require_login</span><span class="p">();</span></div><div class='line' id='LC42'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">require_capability</span><span class="p">(</span><span class="s1">&#39;moodle/site:config&#39;</span><span class="p">,</span> <span class="nx">context_system</span><span class="o">::</span><span class="na">instance</span><span class="p">());</span></div><div class='line' id='LC43'><br/></div><div class='line' id='LC44'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$site</span> <span class="o">=</span> <span class="nx">get_site</span><span class="p">();</span></div><div class='line' id='LC45'><br/></div><div class='line' id='LC46'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="nv">$OUTPUT</span><span class="o">-&gt;</span><span class="na">header</span><span class="p">();</span></div><div class='line' id='LC47'><br/></div><div class='line' id='LC48'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span><span class="p">(</span><span class="nb">strpos</span><span class="p">(</span><span class="nv">$solution</span><span class="p">,</span> <span class="s1">&#39;problem_&#39;</span><span class="p">)</span> <span class="o">===</span> <span class="mi">0</span> <span class="o">&amp;&amp;</span> <span class="nb">class_exists</span><span class="p">(</span><span class="nv">$solution</span><span class="p">))</span> <span class="p">{</span></div><div class='line' id='LC49'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">health_print_solution</span><span class="p">(</span><span class="nv">$solution</span><span class="p">);</span></div><div class='line' id='LC50'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC51'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">else</span> <span class="p">{</span></div><div class='line' id='LC52'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">health_find_problems</span><span class="p">();</span></div><div class='line' id='LC53'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC54'><br/></div><div class='line' id='LC55'><br/></div><div class='line' id='LC56'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="nv">$OUTPUT</span><span class="o">-&gt;</span><span class="na">footer</span><span class="p">();</span></div><div class='line' id='LC57'><br/></div><div class='line' id='LC58'><br/></div><div class='line' id='LC59'><span class="k">function</span> <span class="nf">health_find_problems</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC60'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">global</span> <span class="nv">$OUTPUT</span><span class="p">;</span></div><div class='line' id='LC61'><br/></div><div class='line' id='LC62'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="nv">$OUTPUT</span><span class="o">-&gt;</span><span class="na">heading</span><span class="p">(</span><span class="nx">get_string</span><span class="p">(</span><span class="s1">&#39;pluginname&#39;</span><span class="p">,</span> <span class="s1">&#39;tool_health&#39;</span><span class="p">));</span></div><div class='line' id='LC63'><br/></div><div class='line' id='LC64'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$issues</span>   <span class="o">=</span> <span class="k">array</span><span class="p">(</span></div><div class='line' id='LC65'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">SEVERITY_CRITICAL</span>    <span class="o">=&gt;</span> <span class="k">array</span><span class="p">(),</span></div><div class='line' id='LC66'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">SEVERITY_SIGNIFICANT</span> <span class="o">=&gt;</span> <span class="k">array</span><span class="p">(),</span></div><div class='line' id='LC67'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">SEVERITY_ANNOYANCE</span>   <span class="o">=&gt;</span> <span class="k">array</span><span class="p">(),</span></div><div class='line' id='LC68'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">SEVERITY_NOTICE</span>      <span class="o">=&gt;</span> <span class="k">array</span><span class="p">(),</span></div><div class='line' id='LC69'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">);</span></div><div class='line' id='LC70'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$problems</span> <span class="o">=</span> <span class="mi">0</span><span class="p">;</span></div><div class='line' id='LC71'><br/></div><div class='line' id='LC72'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">for</span><span class="p">(</span><span class="nv">$i</span> <span class="o">=</span> <span class="mi">1</span><span class="p">;</span> <span class="nv">$i</span> <span class="o">&lt;</span> <span class="mi">1000000</span><span class="p">;</span> <span class="o">++</span><span class="nv">$i</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC73'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$classname</span> <span class="o">=</span> <span class="nb">sprintf</span><span class="p">(</span><span class="s1">&#39;problem_%06d&#39;</span><span class="p">,</span> <span class="nv">$i</span><span class="p">);</span></div><div class='line' id='LC74'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span><span class="p">(</span><span class="o">!</span><span class="nb">class_exists</span><span class="p">(</span><span class="nv">$classname</span><span class="p">))</span> <span class="p">{</span></div><div class='line' id='LC75'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">continue</span><span class="p">;</span></div><div class='line' id='LC76'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC77'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$problem</span> <span class="o">=</span> <span class="k">new</span> <span class="nv">$classname</span><span class="p">;</span></div><div class='line' id='LC78'><br/></div><div class='line' id='LC79'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span><span class="p">(</span><span class="nv">$problem</span><span class="o">-&gt;</span><span class="na">exists</span><span class="p">())</span> <span class="p">{</span></div><div class='line' id='LC80'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$severity</span> <span class="o">=</span> <span class="nv">$problem</span><span class="o">-&gt;</span><span class="na">severity</span><span class="p">();</span></div><div class='line' id='LC81'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$issues</span><span class="p">[</span><span class="nv">$severity</span><span class="p">][</span><span class="nv">$classname</span><span class="p">]</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span></div><div class='line' id='LC82'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;severity&#39;</span>    <span class="o">=&gt;</span> <span class="nv">$severity</span><span class="p">,</span></div><div class='line' id='LC83'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;description&#39;</span> <span class="o">=&gt;</span> <span class="nv">$problem</span><span class="o">-&gt;</span><span class="na">description</span><span class="p">(),</span></div><div class='line' id='LC84'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;title&#39;</span>       <span class="o">=&gt;</span> <span class="nv">$problem</span><span class="o">-&gt;</span><span class="na">title</span><span class="p">()</span></div><div class='line' id='LC85'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">);</span></div><div class='line' id='LC86'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="o">++</span><span class="nv">$problems</span><span class="p">;</span></div><div class='line' id='LC87'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC88'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nb">unset</span><span class="p">(</span><span class="nv">$problem</span><span class="p">);</span></div><div class='line' id='LC89'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC90'><br/></div><div class='line' id='LC91'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span><span class="p">(</span><span class="nv">$problems</span> <span class="o">==</span> <span class="mi">0</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC92'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="s1">&#39;&lt;div id=&quot;healthnoproblemsfound&quot;&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC93'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="nx">get_string</span><span class="p">(</span><span class="s1">&#39;healthnoproblemsfound&#39;</span><span class="p">,</span> <span class="s1">&#39;tool_health&#39;</span><span class="p">);</span></div><div class='line' id='LC94'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="s1">&#39;&lt;/div&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC95'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC96'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">else</span> <span class="p">{</span></div><div class='line' id='LC97'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="nv">$OUTPUT</span><span class="o">-&gt;</span><span class="na">heading</span><span class="p">(</span><span class="nx">get_string</span><span class="p">(</span><span class="s1">&#39;healthproblemsdetected&#39;</span><span class="p">,</span> <span class="s1">&#39;tool_health&#39;</span><span class="p">));</span></div><div class='line' id='LC98'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$severities</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="nx">SEVERITY_CRITICAL</span><span class="p">,</span> <span class="nx">SEVERITY_SIGNIFICANT</span><span class="p">,</span> <span class="nx">SEVERITY_ANNOYANCE</span><span class="p">,</span> <span class="nx">SEVERITY_NOTICE</span><span class="p">);</span></div><div class='line' id='LC99'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">foreach</span><span class="p">(</span><span class="nv">$severities</span> <span class="k">as</span> <span class="nv">$severity</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC100'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span><span class="p">(</span><span class="o">!</span><span class="k">empty</span><span class="p">(</span><span class="nv">$issues</span><span class="p">[</span><span class="nv">$severity</span><span class="p">]))</span> <span class="p">{</span></div><div class='line' id='LC101'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="s1">&#39;&lt;dl class=&quot;healthissues &#39;</span><span class="o">.</span><span class="nv">$severity</span><span class="o">.</span><span class="s1">&#39;&quot;&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC102'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">foreach</span><span class="p">(</span><span class="nv">$issues</span><span class="p">[</span><span class="nv">$severity</span><span class="p">]</span> <span class="k">as</span> <span class="nv">$classname</span> <span class="o">=&gt;</span> <span class="nv">$data</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC103'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="s1">&#39;&lt;dt id=&quot;&#39;</span><span class="o">.</span><span class="nv">$classname</span><span class="o">.</span><span class="s1">&#39;&quot;&gt;&#39;</span><span class="o">.</span><span class="nv">$data</span><span class="p">[</span><span class="s1">&#39;title&#39;</span><span class="p">]</span><span class="o">.</span><span class="s1">&#39;&lt;/dt&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC104'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="s1">&#39;&lt;dd&gt;&#39;</span><span class="o">.</span><span class="nv">$data</span><span class="p">[</span><span class="s1">&#39;description&#39;</span><span class="p">];</span></div><div class='line' id='LC105'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="s1">&#39;&lt;form action=&quot;index.php#solution&quot; method=&quot;get&quot;&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC106'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="s1">&#39;&lt;input type=&quot;hidden&quot; name=&quot;solution&quot; value=&quot;&#39;</span><span class="o">.</span><span class="nv">$classname</span><span class="o">.</span><span class="s1">&#39;&quot; /&gt;&lt;input type=&quot;submit&quot; value=&quot;&#39;</span><span class="o">.</span><span class="nx">get_string</span><span class="p">(</span><span class="s1">&#39;viewsolution&#39;</span><span class="p">)</span><span class="o">.</span><span class="s1">&#39;&quot; /&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC107'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="s1">&#39;&lt;/form&gt;&lt;/dd&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC108'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC109'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="s1">&#39;&lt;/dl&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC110'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC111'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC112'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC113'><span class="p">}</span></div><div class='line' id='LC114'><br/></div><div class='line' id='LC115'><span class="k">function</span> <span class="nf">health_print_solution</span><span class="p">(</span><span class="nv">$classname</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC116'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">global</span> <span class="nv">$OUTPUT</span><span class="p">;</span></div><div class='line' id='LC117'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$problem</span> <span class="o">=</span> <span class="k">new</span> <span class="nv">$classname</span><span class="p">;</span></div><div class='line' id='LC118'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$data</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span></div><div class='line' id='LC119'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;title&#39;</span>       <span class="o">=&gt;</span> <span class="nv">$problem</span><span class="o">-&gt;</span><span class="na">title</span><span class="p">(),</span></div><div class='line' id='LC120'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;severity&#39;</span>    <span class="o">=&gt;</span> <span class="nv">$problem</span><span class="o">-&gt;</span><span class="na">severity</span><span class="p">(),</span></div><div class='line' id='LC121'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;description&#39;</span> <span class="o">=&gt;</span> <span class="nv">$problem</span><span class="o">-&gt;</span><span class="na">description</span><span class="p">(),</span></div><div class='line' id='LC122'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;solution&#39;</span>    <span class="o">=&gt;</span> <span class="nv">$problem</span><span class="o">-&gt;</span><span class="na">solution</span><span class="p">()</span></div><div class='line' id='LC123'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">);</span></div><div class='line' id='LC124'><br/></div><div class='line' id='LC125'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="nv">$OUTPUT</span><span class="o">-&gt;</span><span class="na">heading</span><span class="p">(</span><span class="nx">get_string</span><span class="p">(</span><span class="s1">&#39;pluginname&#39;</span><span class="p">,</span> <span class="s1">&#39;tool_health&#39;</span><span class="p">));</span></div><div class='line' id='LC126'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="nv">$OUTPUT</span><span class="o">-&gt;</span><span class="na">heading</span><span class="p">(</span><span class="nx">get_string</span><span class="p">(</span><span class="s1">&#39;healthproblemsolution&#39;</span><span class="p">,</span> <span class="s1">&#39;tool_health&#39;</span><span class="p">));</span></div><div class='line' id='LC127'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="s1">&#39;&lt;dl class=&quot;healthissues &#39;</span><span class="o">.</span><span class="nv">$data</span><span class="p">[</span><span class="s1">&#39;severity&#39;</span><span class="p">]</span><span class="o">.</span><span class="s1">&#39;&quot;&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC128'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="s1">&#39;&lt;dt&gt;&#39;</span><span class="o">.</span><span class="nv">$data</span><span class="p">[</span><span class="s1">&#39;title&#39;</span><span class="p">]</span><span class="o">.</span><span class="s1">&#39;&lt;/dt&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC129'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="s1">&#39;&lt;dd&gt;&#39;</span><span class="o">.</span><span class="nv">$data</span><span class="p">[</span><span class="s1">&#39;description&#39;</span><span class="p">]</span><span class="o">.</span><span class="s1">&#39;&lt;/dd&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC130'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="s1">&#39;&lt;dt id=&quot;solution&quot; class=&quot;solution&quot;&gt;&#39;</span><span class="o">.</span><span class="nx">get_string</span><span class="p">(</span><span class="s1">&#39;healthsolution&#39;</span><span class="p">,</span> <span class="s1">&#39;tool_health&#39;</span><span class="p">)</span><span class="o">.</span><span class="s1">&#39;&lt;/dt&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC131'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="s1">&#39;&lt;dd class=&quot;solution&quot;&gt;&#39;</span><span class="o">.</span><span class="nv">$data</span><span class="p">[</span><span class="s1">&#39;solution&#39;</span><span class="p">]</span><span class="o">.</span><span class="s1">&#39;&lt;/dd&gt;&lt;/dl&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC132'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="s1">&#39;&lt;form id=&quot;healthformreturn&quot; action=&quot;index.php#&#39;</span><span class="o">.</span><span class="nv">$classname</span><span class="o">.</span><span class="s1">&#39;&quot; method=&quot;get&quot;&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC133'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="s1">&#39;&lt;input type=&quot;submit&quot; value=&quot;&#39;</span><span class="o">.</span><span class="nx">get_string</span><span class="p">(</span><span class="s1">&#39;healthreturntomain&#39;</span><span class="p">,</span> <span class="s1">&#39;tool_health&#39;</span><span class="p">)</span><span class="o">.</span><span class="s1">&#39;&quot; /&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC134'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">echo</span> <span class="s1">&#39;&lt;/form&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC135'><span class="p">}</span></div><div class='line' id='LC136'><br/></div><div class='line' id='LC137'><span class="k">class</span> <span class="nc">problem_base</span> <span class="p">{</span></div><div class='line' id='LC138'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">exists</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC139'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="k">false</span><span class="p">;</span></div><div class='line' id='LC140'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC141'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">title</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC142'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;???&#39;</span><span class="p">;</span></div><div class='line' id='LC143'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC144'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">severity</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC145'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nx">SEVERITY_NOTICE</span><span class="p">;</span></div><div class='line' id='LC146'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC147'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">description</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC148'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;&#39;</span><span class="p">;</span></div><div class='line' id='LC149'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC150'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">solution</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC151'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;&#39;</span><span class="p">;</span></div><div class='line' id='LC152'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC153'><span class="p">}</span></div><div class='line' id='LC154'><br/></div><div class='line' id='LC155'><span class="k">class</span> <span class="nc">problem_000002</span> <span class="k">extends</span> <span class="nx">problem_base</span> <span class="p">{</span></div><div class='line' id='LC156'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">title</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC157'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;Extra characters at the end of config.php or other library function&#39;</span><span class="p">;</span></div><div class='line' id='LC158'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC159'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">exists</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC160'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">global</span> <span class="nv">$extraws</span><span class="p">;</span></div><div class='line' id='LC161'><br/></div><div class='line' id='LC162'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span><span class="p">(</span><span class="nv">$extraws</span> <span class="o">===</span> <span class="s1">&#39;&#39;</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC163'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="k">false</span><span class="p">;</span></div><div class='line' id='LC164'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC165'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="k">true</span><span class="p">;</span></div><div class='line' id='LC166'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC167'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">severity</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC168'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nx">SEVERITY_SIGNIFICANT</span><span class="p">;</span></div><div class='line' id='LC169'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC170'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">description</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC171'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;Your Moodle configuration file config.php or another library file, contains some characters after the closing PHP tag (?&gt;). This causes Moodle to exhibit several kinds of problems (such as broken downloaded files) and must be fixed.&#39;</span><span class="p">;</span></div><div class='line' id='LC172'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC173'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">solution</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC174'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">global</span> <span class="nv">$CFG</span><span class="p">;</span></div><div class='line' id='LC175'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;You need to edit &lt;strong&gt;&#39;</span><span class="o">.</span><span class="nv">$CFG</span><span class="o">-&gt;</span><span class="na">dirroot</span><span class="o">.</span><span class="s1">&#39;/config.php&lt;/strong&gt; and remove all characters (including spaces and returns) after the ending ?&gt; tag. These two characters should be the very last in that file. The extra trailing whitespace may be also present in other PHP files that are included from lib/setup.php.&#39;</span><span class="p">;</span></div><div class='line' id='LC176'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC177'><span class="p">}</span></div><div class='line' id='LC178'><br/></div><div class='line' id='LC179'><span class="k">class</span> <span class="nc">problem_000003</span> <span class="k">extends</span> <span class="nx">problem_base</span> <span class="p">{</span></div><div class='line' id='LC180'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">title</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC181'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;$CFG-&gt;dataroot does not exist or does not have write permissions&#39;</span><span class="p">;</span></div><div class='line' id='LC182'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC183'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">exists</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC184'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">global</span> <span class="nv">$CFG</span><span class="p">;</span></div><div class='line' id='LC185'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span><span class="p">(</span><span class="o">!</span><span class="nb">is_dir</span><span class="p">(</span><span class="nv">$CFG</span><span class="o">-&gt;</span><span class="na">dataroot</span><span class="p">)</span> <span class="o">||</span> <span class="o">!</span><span class="nb">is_writable</span><span class="p">(</span><span class="nv">$CFG</span><span class="o">-&gt;</span><span class="na">dataroot</span><span class="p">))</span> <span class="p">{</span></div><div class='line' id='LC186'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="k">true</span><span class="p">;</span></div><div class='line' id='LC187'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC188'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="k">false</span><span class="p">;</span></div><div class='line' id='LC189'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC190'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">severity</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC191'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nx">SEVERITY_SIGNIFICANT</span><span class="p">;</span></div><div class='line' id='LC192'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC193'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">description</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC194'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">global</span> <span class="nv">$CFG</span><span class="p">;</span></div><div class='line' id='LC195'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;Your &lt;strong&gt;config.php&lt;/strong&gt; says that your &quot;data root&quot; directory is &lt;strong&gt;&#39;</span><span class="o">.</span><span class="nv">$CFG</span><span class="o">-&gt;</span><span class="na">dataroot</span><span class="o">.</span><span class="s1">&#39;&lt;/strong&gt;. However, this directory either does not exist or cannot be written to by Moodle. This means that a variety of problems will be present, such as users not being able to log in and not being able to upload any files. It is imperative that you address this problem for Moodle to work correctly.&#39;</span><span class="p">;</span></div><div class='line' id='LC196'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC197'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">solution</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC198'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">global</span> <span class="nv">$CFG</span><span class="p">;</span></div><div class='line' id='LC199'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;First of all, make sure that the directory &lt;strong&gt;&#39;</span><span class="o">.</span><span class="nv">$CFG</span><span class="o">-&gt;</span><span class="na">dataroot</span><span class="o">.</span><span class="s1">&#39;&lt;/strong&gt; exists. If the directory does exist, then you must make sure that Moodle is able to write to it. Contact your web server administrator and request that he gives write permissions for that directory to the user that the web server process is running as.&#39;</span><span class="p">;</span></div><div class='line' id='LC200'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC201'><span class="p">}</span></div><div class='line' id='LC202'><br/></div><div class='line' id='LC203'><span class="k">class</span> <span class="nc">problem_000004</span> <span class="k">extends</span> <span class="nx">problem_base</span> <span class="p">{</span></div><div class='line' id='LC204'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">title</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC205'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;cron.php is not set up to run automatically&#39;</span><span class="p">;</span></div><div class='line' id='LC206'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC207'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">exists</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC208'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">global</span> <span class="nv">$DB</span><span class="p">;</span></div><div class='line' id='LC209'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$lastcron</span> <span class="o">=</span> <span class="nv">$DB</span><span class="o">-&gt;</span><span class="na">get_field_sql</span><span class="p">(</span><span class="s1">&#39;SELECT max(lastcron) FROM {modules}&#39;</span><span class="p">);</span></div><div class='line' id='LC210'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="p">(</span><span class="nb">time</span><span class="p">()</span> <span class="o">-</span> <span class="nv">$lastcron</span> <span class="o">&gt;</span> <span class="mi">3600</span> <span class="o">*</span> <span class="mi">24</span><span class="p">);</span></div><div class='line' id='LC211'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC212'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">severity</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC213'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nx">SEVERITY_SIGNIFICANT</span><span class="p">;</span></div><div class='line' id='LC214'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC215'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">description</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC216'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;The cron.php mainenance script has not been run in the past 24 hours. This probably means that your server is not configured to automatically run this script in regular time intervals. If this is the case, then Moodle will mostly work as it should but some operations (notably sending email to users) will not be carried out at all.&#39;</span><span class="p">;</span></div><div class='line' id='LC217'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC218'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">solution</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC219'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">global</span> <span class="nv">$CFG</span><span class="p">;</span></div><div class='line' id='LC220'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;For detailed instructions on how to enable cron, see &lt;a href=&quot;&#39;</span><span class="o">.</span><span class="nv">$CFG</span><span class="o">-&gt;</span><span class="na">wwwroot</span><span class="o">.</span><span class="s1">&#39;/doc/?file=install.html#cron&quot;&gt;this section&lt;/a&gt; of the installation manual.&#39;</span><span class="p">;</span></div><div class='line' id='LC221'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC222'><span class="p">}</span></div><div class='line' id='LC223'><br/></div><div class='line' id='LC224'><span class="k">class</span> <span class="nc">problem_000005</span> <span class="k">extends</span> <span class="nx">problem_base</span> <span class="p">{</span></div><div class='line' id='LC225'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">title</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC226'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;PHP: session.auto_start is enabled&#39;</span><span class="p">;</span></div><div class='line' id='LC227'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC228'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">exists</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC229'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nx">ini_get_bool</span><span class="p">(</span><span class="s1">&#39;session.auto_start&#39;</span><span class="p">);</span></div><div class='line' id='LC230'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC231'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">severity</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC232'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nx">SEVERITY_CRITICAL</span><span class="p">;</span></div><div class='line' id='LC233'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC234'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">description</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC235'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;Your PHP configuration includes an enabled setting, session.auto_start, that &lt;strong&gt;must be disabled&lt;/strong&gt; in order for Moodle to work correctly. Notable symptoms arising from this misconfiguration include fatal errors and/or blank pages when trying to log in.&#39;</span><span class="p">;</span></div><div class='line' id='LC236'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC237'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">solution</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC238'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">global</span> <span class="nv">$CFG</span><span class="p">;</span></div><div class='line' id='LC239'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;&lt;p&gt;There are two ways you can solve this problem:&lt;/p&gt;&lt;ol&gt;&lt;li&gt;If you have access to your main &lt;strong&gt;php.ini&lt;/strong&gt; file, then find the line that looks like this: &lt;pre&gt;session.auto_start = 1&lt;/pre&gt; and change it to &lt;pre&gt;session.auto_start = 0&lt;/pre&gt; and then restart your web server. Be warned that this, as any other PHP setting change, might affect other web applications running on the server.&lt;/li&gt;&lt;li&gt;Finally, you may be able to change this setting just for your site by creating or editing the file &lt;strong&gt;&#39;</span><span class="o">.</span><span class="nv">$CFG</span><span class="o">-&gt;</span><span class="na">dirroot</span><span class="o">.</span><span class="s1">&#39;/.htaccess&lt;/strong&gt; to contain this line: &lt;pre&gt;php_value session.auto_start &quot;0&quot;&lt;/pre&gt;&lt;/li&gt;&lt;/ol&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC240'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC241'><span class="p">}</span></div><div class='line' id='LC242'><br/></div><div class='line' id='LC243'><span class="k">class</span> <span class="nc">problem_000006</span> <span class="k">extends</span> <span class="nx">problem_base</span> <span class="p">{</span></div><div class='line' id='LC244'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">title</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC245'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;PHP: magic_quotes_runtime is enabled&#39;</span><span class="p">;</span></div><div class='line' id='LC246'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC247'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">exists</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC248'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="p">(</span><span class="nx">ini_get_bool</span><span class="p">(</span><span class="s1">&#39;magic_quotes_runtime&#39;</span><span class="p">));</span></div><div class='line' id='LC249'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC250'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">severity</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC251'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nx">SEVERITY_SIGNIFICANT</span><span class="p">;</span></div><div class='line' id='LC252'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC253'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">description</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC254'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;Your PHP configuration includes an enabled setting, magic_quotes_runtime, that &lt;strong&gt;must be disabled&lt;/strong&gt; in order for Moodle to work correctly. Notable symptoms arising from this misconfiguration include strange display errors whenever a text field that includes single or double quotes is processed.&#39;</span><span class="p">;</span></div><div class='line' id='LC255'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC256'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">solution</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC257'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">global</span> <span class="nv">$CFG</span><span class="p">;</span></div><div class='line' id='LC258'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;&lt;p&gt;There are two ways you can solve this problem:&lt;/p&gt;&lt;ol&gt;&lt;li&gt;If you have access to your main &lt;strong&gt;php.ini&lt;/strong&gt; file, then find the line that looks like this: &lt;pre&gt;magic_quotes_runtime = On&lt;/pre&gt; and change it to &lt;pre&gt;magic_quotes_runtime = Off&lt;/pre&gt; and then restart your web server. Be warned that this, as any other PHP setting change, might affect other web applications running on the server.&lt;/li&gt;&lt;li&gt;Finally, you may be able to change this setting just for your site by creating or editing the file &lt;strong&gt;&#39;</span><span class="o">.</span><span class="nv">$CFG</span><span class="o">-&gt;</span><span class="na">dirroot</span><span class="o">.</span><span class="s1">&#39;/.htaccess&lt;/strong&gt; to contain this line: &lt;pre&gt;php_value magic_quotes_runtime &quot;Off&quot;&lt;/pre&gt;&lt;/li&gt;&lt;/ol&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC259'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC260'><span class="p">}</span></div><div class='line' id='LC261'><br/></div><div class='line' id='LC262'><span class="k">class</span> <span class="nc">problem_000007</span> <span class="k">extends</span> <span class="nx">problem_base</span> <span class="p">{</span></div><div class='line' id='LC263'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">title</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC264'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;PHP: file_uploads is disabled&#39;</span><span class="p">;</span></div><div class='line' id='LC265'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC266'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">exists</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC267'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="o">!</span><span class="nx">ini_get_bool</span><span class="p">(</span><span class="s1">&#39;file_uploads&#39;</span><span class="p">);</span></div><div class='line' id='LC268'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC269'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">severity</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC270'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nx">SEVERITY_SIGNIFICANT</span><span class="p">;</span></div><div class='line' id='LC271'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC272'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">description</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC273'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;Your PHP configuration includes a disabled setting, file_uploads, that &lt;strong&gt;must be enabled&lt;/strong&gt; to let Moodle offer its full functionality. Until this setting is enabled, it will not be possible to upload any files into Moodle. This includes, for example, course content and user pictures.&#39;</span><span class="p">;</span></div><div class='line' id='LC274'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC275'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">solution</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC276'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">global</span> <span class="nv">$CFG</span><span class="p">;</span></div><div class='line' id='LC277'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;&lt;p&gt;There are two ways you can solve this problem:&lt;/p&gt;&lt;ol&gt;&lt;li&gt;If you have access to your main &lt;strong&gt;php.ini&lt;/strong&gt; file, then find the line that looks like this: &lt;pre&gt;file_uploads = Off&lt;/pre&gt; and change it to &lt;pre&gt;file_uploads = On&lt;/pre&gt; and then restart your web server. Be warned that this, as any other PHP setting change, might affect other web applications running on the server.&lt;/li&gt;&lt;li&gt;Finally, you may be able to change this setting just for your site by creating or editing the file &lt;strong&gt;&#39;</span><span class="o">.</span><span class="nv">$CFG</span><span class="o">-&gt;</span><span class="na">dirroot</span><span class="o">.</span><span class="s1">&#39;/.htaccess&lt;/strong&gt; to contain this line: &lt;pre&gt;php_value file_uploads &quot;On&quot;&lt;/pre&gt;&lt;/li&gt;&lt;/ol&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC278'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC279'><span class="p">}</span></div><div class='line' id='LC280'><br/></div><div class='line' id='LC281'><span class="k">class</span> <span class="nc">problem_000008</span> <span class="k">extends</span> <span class="nx">problem_base</span> <span class="p">{</span></div><div class='line' id='LC282'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">title</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC283'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;PHP: memory_limit cannot be controlled by Moodle&#39;</span><span class="p">;</span></div><div class='line' id='LC284'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC285'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">exists</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC286'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">global</span> <span class="nv">$CFG</span><span class="p">;</span></div><div class='line' id='LC287'><br/></div><div class='line' id='LC288'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$oldmemlimit</span> <span class="o">=</span> <span class="o">@</span><span class="nb">ini_get</span><span class="p">(</span><span class="s1">&#39;memory_limit&#39;</span><span class="p">);</span></div><div class='line' id='LC289'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span> <span class="p">(</span><span class="k">empty</span><span class="p">(</span><span class="nv">$oldmemlimit</span><span class="p">))</span> <span class="p">{</span></div><div class='line' id='LC290'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="c1">// PHP not compiled with memory limits, this means that it&#39;s</span></div><div class='line' id='LC291'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="c1">// probably limited to 8M or in case of Windows not at all.</span></div><div class='line' id='LC292'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="c1">// We can ignore it for now - there is not much to test anyway</span></div><div class='line' id='LC293'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="c1">// TODO: add manual test that fills memory??</span></div><div class='line' id='LC294'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="k">false</span><span class="p">;</span></div><div class='line' id='LC295'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC296'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$oldmemlimit</span> <span class="o">=</span> <span class="nx">get_real_size</span><span class="p">(</span><span class="nv">$oldmemlimit</span><span class="p">);</span></div><div class='line' id='LC297'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="c1">//now lets change the memory limit to something higher</span></div><div class='line' id='LC298'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$newmemlimit</span> <span class="o">=</span> <span class="p">(</span><span class="nv">$oldmemlimit</span> <span class="o">+</span> <span class="mi">1024</span><span class="o">*</span><span class="mi">1024</span><span class="o">*</span><span class="mi">5</span><span class="p">);</span></div><div class='line' id='LC299'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">raise_memory_limit</span><span class="p">(</span><span class="nv">$newmemlimit</span><span class="p">);</span></div><div class='line' id='LC300'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$testmemlimit</span> <span class="o">=</span> <span class="nx">get_real_size</span><span class="p">(</span><span class="o">@</span><span class="nb">ini_get</span><span class="p">(</span><span class="s1">&#39;memory_limit&#39;</span><span class="p">));</span></div><div class='line' id='LC301'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="c1">//verify the change had any effect at all</span></div><div class='line' id='LC302'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span> <span class="p">(</span><span class="nv">$oldmemlimit</span> <span class="o">==</span> <span class="nv">$testmemlimit</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC303'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="c1">//memory limit can not be changed - is it big enough then?</span></div><div class='line' id='LC304'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span> <span class="p">(</span><span class="nv">$oldmemlimit</span> <span class="o">&lt;</span> <span class="nx">get_real_size</span><span class="p">(</span><span class="s1">&#39;128M&#39;</span><span class="p">))</span> <span class="p">{</span></div><div class='line' id='LC305'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="k">true</span><span class="p">;</span></div><div class='line' id='LC306'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span> <span class="k">else</span> <span class="p">{</span></div><div class='line' id='LC307'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="k">false</span><span class="p">;</span></div><div class='line' id='LC308'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC309'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC310'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">reduce_memory_limit</span><span class="p">(</span><span class="nv">$oldmemlimit</span><span class="p">);</span></div><div class='line' id='LC311'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="k">false</span><span class="p">;</span></div><div class='line' id='LC312'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC313'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">severity</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC314'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nx">SEVERITY_NOTICE</span><span class="p">;</span></div><div class='line' id='LC315'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC316'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">description</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC317'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;The settings for PHP on your server do not allow a script to request more memory during its execution. &#39;</span><span class="o">.</span></div><div class='line' id='LC318'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;This means that there is a hard limit of &#39;</span><span class="o">.@</span><span class="nb">ini_get</span><span class="p">(</span><span class="s1">&#39;memory_limit&#39;</span><span class="p">)</span><span class="o">.</span><span class="s1">&#39; for each script. &#39;</span><span class="o">.</span></div><div class='line' id='LC319'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;It is possible that certain operations within Moodle will require more than this amount in order &#39;</span><span class="o">.</span></div><div class='line' id='LC320'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;to complete successfully, especially if there are lots of data to be processed.&#39;</span><span class="p">;</span></div><div class='line' id='LC321'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC322'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">solution</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC323'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;It is recommended that you contact your web server administrator to address this issue.&#39;</span><span class="p">;</span></div><div class='line' id='LC324'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC325'><span class="p">}</span></div><div class='line' id='LC326'><br/></div><div class='line' id='LC327'><span class="k">class</span> <span class="nc">problem_000009</span> <span class="k">extends</span> <span class="nx">problem_base</span> <span class="p">{</span></div><div class='line' id='LC328'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">title</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC329'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;SQL: using account without password&#39;</span><span class="p">;</span></div><div class='line' id='LC330'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC331'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">exists</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC332'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">global</span> <span class="nv">$CFG</span><span class="p">;</span></div><div class='line' id='LC333'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="k">empty</span><span class="p">(</span><span class="nv">$CFG</span><span class="o">-&gt;</span><span class="na">dbpass</span><span class="p">);</span></div><div class='line' id='LC334'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC335'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">severity</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC336'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nx">SEVERITY_CRITICAL</span><span class="p">;</span></div><div class='line' id='LC337'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC338'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">description</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC339'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">global</span> <span class="nv">$CFG</span><span class="p">;</span></div><div class='line' id='LC340'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;The user account your are connecting to the database server with is set up without a password. This is a very big security risk and is only somewhat lessened if your database is configured to not accept connections from any hosts other than the server Moodle is running on. Unless you use a strong password to connect to the database, you risk unauthorized access to and manipulation of your data.&#39;</span><span class="o">.</span><span class="p">(</span><span class="nv">$CFG</span><span class="o">-&gt;</span><span class="na">dbuser</span> <span class="o">!=</span> <span class="s1">&#39;root&#39;</span><span class="o">?</span><span class="s1">&#39;&#39;</span><span class="o">:</span><span class="s1">&#39; &lt;strong&gt;This is especially alarming because such access to the database would be as the superuser (root)!&lt;/strong&gt;&#39;</span><span class="p">);</span></div><div class='line' id='LC341'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC342'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">solution</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC343'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">global</span> <span class="nv">$CFG</span><span class="p">;</span></div><div class='line' id='LC344'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;You should change the password of the user &lt;strong&gt;&#39;</span><span class="o">.</span><span class="nv">$CFG</span><span class="o">-&gt;</span><span class="na">dbuser</span><span class="o">.</span><span class="s1">&#39;&lt;/strong&gt; both in your database and in your Moodle &lt;strong&gt;config.php&lt;/strong&gt; immediately!&#39;</span><span class="o">.</span><span class="p">(</span><span class="nv">$CFG</span><span class="o">-&gt;</span><span class="na">dbuser</span> <span class="o">!=</span> <span class="s1">&#39;root&#39;</span><span class="o">?</span><span class="s1">&#39;&#39;</span><span class="o">:</span><span class="s1">&#39; It would also be a good idea to change the user account from root to something else, because this would lessen the impact in the event that your database is compromised anyway.&#39;</span><span class="p">);</span></div><div class='line' id='LC345'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC346'><span class="p">}</span></div><div class='line' id='LC347'><span class="cm">/* // not implemented in 2.0 yet</span></div><div class='line' id='LC348'><span class="cm">class problem_000010 extends problem_base {</span></div><div class='line' id='LC349'><span class="cm">    function title() {</span></div><div class='line' id='LC350'><span class="cm">        return &#39;Uploaded files: slasharguments disabled or not working&#39;;</span></div><div class='line' id='LC351'><span class="cm">    }</span></div><div class='line' id='LC352'><span class="cm">    function exists() {</span></div><div class='line' id='LC353'><span class="cm">        if (!$this-&gt;is_enabled()) {</span></div><div class='line' id='LC354'><span class="cm">            return true;</span></div><div class='line' id='LC355'><span class="cm">        }</span></div><div class='line' id='LC356'><span class="cm">        if ($this-&gt;status() &lt; 1) {</span></div><div class='line' id='LC357'><span class="cm">            return true;</span></div><div class='line' id='LC358'><span class="cm">        }</span></div><div class='line' id='LC359'><span class="cm">        return false;</span></div><div class='line' id='LC360'><span class="cm">    }</span></div><div class='line' id='LC361'><span class="cm">    function severity() {</span></div><div class='line' id='LC362'><span class="cm">        if ($this-&gt;is_enabled() and $this-&gt;status() == 0) {</span></div><div class='line' id='LC363'><span class="cm">            return SEVERITY_SIGNIFICANT;</span></div><div class='line' id='LC364'><span class="cm">        } else {</span></div><div class='line' id='LC365'><span class="cm">            return SEVERITY_ANNOYANCE;</span></div><div class='line' id='LC366'><span class="cm">        }</span></div><div class='line' id='LC367'><span class="cm">    }</span></div><div class='line' id='LC368'><span class="cm">    function description() {</span></div><div class='line' id='LC369'><span class="cm">        global $CFG;</span></div><div class='line' id='LC370'><span class="cm">        $desc = &#39;Slasharguments are needed for relative linking in uploaded resources:&lt;ul&gt;&#39;;</span></div><div class='line' id='LC371'><span class="cm">        if (!$this-&gt;is_enabled()) {</span></div><div class='line' id='LC372'><span class="cm">            $desc .= &#39;&lt;li&gt;slasharguments are &lt;strong&gt;disabled&lt;/strong&gt; in Moodle configuration&lt;/li&gt;&#39;;</span></div><div class='line' id='LC373'><span class="cm">        } else {</span></div><div class='line' id='LC374'><span class="cm">            $desc .= &#39;&lt;li&gt;slasharguments are enabled in Moodle configuration&lt;/li&gt;&#39;;</span></div><div class='line' id='LC375'><span class="cm">        }</span></div><div class='line' id='LC376'><span class="cm">        if ($this-&gt;status() == -1) {</span></div><div class='line' id='LC377'><span class="cm">            $desc .= &#39;&lt;li&gt;can not run automatic test, you can verify it &lt;a href=&quot;&#39;.$CFG-&gt;wwwroot.&#39;/file.php/testslasharguments&quot; target=&quot;_blank&quot;&gt;here&lt;/a&gt; manually&lt;/li&gt;&#39;;</span></div><div class='line' id='LC378'><span class="cm">        } else if ($this-&gt;status() == 0) {</span></div><div class='line' id='LC379'><span class="cm">            $desc .= &#39;&lt;li&gt;slashargument test &lt;strong&gt;failed&lt;/strong&gt;, please check server configuration&lt;/li&gt;&#39;;</span></div><div class='line' id='LC380'><span class="cm">        } else {</span></div><div class='line' id='LC381'><span class="cm">            $desc .= &#39;&lt;li&gt;slashargument test passed&lt;/li&gt;&#39;;</span></div><div class='line' id='LC382'><span class="cm">        }</span></div><div class='line' id='LC383'><span class="cm">        $desc .= &#39;&lt;/ul&gt;&#39;;</span></div><div class='line' id='LC384'><span class="cm">        return $desc;</span></div><div class='line' id='LC385'><span class="cm">    }</span></div><div class='line' id='LC386'><span class="cm">    function solution() {</span></div><div class='line' id='LC387'><span class="cm">        global $CFG;</span></div><div class='line' id='LC388'><span class="cm">        $enabled = $this-&gt;is_enabled();</span></div><div class='line' id='LC389'><span class="cm">        $status = $this-&gt;status();</span></div><div class='line' id='LC390'><span class="cm">        $solution = &#39;&#39;;</span></div><div class='line' id='LC391'><span class="cm">        if ($enabled and ($status == 0)) {</span></div><div class='line' id='LC392'><span class="cm">            $solution .= &#39;Slasharguments are enabled, but the test failed. Please disable slasharguments in Moodle configuration or fix the server configuration.&lt;hr /&gt;&#39;;</span></div><div class='line' id='LC393'><span class="cm">        } else if ((!$enabled) and ($status == 0)) {</span></div><div class='line' id='LC394'><span class="cm">            $solution .= &#39;Slasharguments are disabled and the test failed. You may try to fix the server configuration.&lt;hr /&gt;&#39;;</span></div><div class='line' id='LC395'><span class="cm">        } else if ($enabled and ($status == -1)) {</span></div><div class='line' id='LC396'><span class="cm">            $solution .= &#39;Slasharguments are enabled, &lt;a href=&quot;&#39;.$CFG-&gt;wwwroot.&#39;/file.php/testslasharguments&quot;&gt;automatic testing&lt;/a&gt; not possible.&lt;hr /&gt;&#39;;</span></div><div class='line' id='LC397'><span class="cm">        } else if ((!$enabled) and ($status == -1)) {</span></div><div class='line' id='LC398'><span class="cm">            $solution .= &#39;Slasharguments are disabled, &lt;a href=&quot;&#39;.$CFG-&gt;wwwroot.&#39;/file.php/testslasharguments&quot;&gt;automatic testing&lt;/a&gt; not possible.&lt;hr /&gt;&#39;;</span></div><div class='line' id='LC399'><span class="cm">        } else if ((!$enabled) and ($status &gt; 0)) {</span></div><div class='line' id='LC400'><span class="cm">            $solution .= &#39;Slasharguments are disabled though the iternal test is OK. You should enable slasharguments in Moodle configuration.&#39;;</span></div><div class='line' id='LC401'><span class="cm">        } else if ($enabled and ($status &gt; 0)) {</span></div><div class='line' id='LC402'><span class="cm">            $solution .= &#39;Congratulations - everything seems OK now :-D&#39;;</span></div><div class='line' id='LC403'><span class="cm">        }</span></div><div class='line' id='LC404'><span class="cm">        if ($status &lt; 1) {</span></div><div class='line' id='LC405'><span class="cm">            $solution .= &#39;&lt;p&gt;IIS:&lt;ul&gt;&lt;li&gt;try to add &lt;code&gt;cgi.fix_pathinfo=1&lt;/code&gt; to php.ini&lt;/li&gt;&lt;li&gt;do NOT enable AllowPathInfoForScriptMappings !!!&lt;/li&gt;&lt;li&gt;slasharguments may not work when using ISAPI and PHP 4.3.10 and older&lt;/li&gt;&lt;/ul&gt;&lt;/p&gt;&#39;;</span></div><div class='line' id='LC406'><span class="cm">            $solution .= &#39;&lt;p&gt;Apache 1:&lt;ul&gt;&lt;li&gt;try to add &lt;code&gt;cgi.fix_pathinfo=1&lt;/code&gt; to php.ini&lt;/li&gt;&lt;/ul&gt;&lt;/p&gt;&#39;;</span></div><div class='line' id='LC407'><span class="cm">            $solution .= &#39;&lt;p&gt;Apache 2:&lt;ul&gt;&lt;li&gt;you must add &lt;code&gt;AcceptPathInfo on&lt;/code&gt; to php.ini or .htaccess&lt;/li&gt;&lt;li&gt;try to add &lt;code&gt;cgi.fix_pathinfo=1&lt;/code&gt; to php.ini&lt;/li&gt;&lt;/ul&gt;&lt;/p&gt;&#39;;</span></div><div class='line' id='LC408'><span class="cm">        }</span></div><div class='line' id='LC409'><span class="cm">        return $solution;</span></div><div class='line' id='LC410'><span class="cm">    }</span></div><div class='line' id='LC411'><span class="cm">    function is_enabled() {</span></div><div class='line' id='LC412'><span class="cm">        global $CFG;</span></div><div class='line' id='LC413'><span class="cm">        return !empty($CFG-&gt;slasharguments);</span></div><div class='line' id='LC414'><span class="cm">    }</span></div><div class='line' id='LC415'><span class="cm">    function status() {</span></div><div class='line' id='LC416'><span class="cm">        global $CFG;</span></div><div class='line' id='LC417'><span class="cm">        $handle = @fopen($CFG-&gt;wwwroot.&#39;/file.php?file=/testslasharguments&#39;, &quot;r&quot;);</span></div><div class='line' id='LC418'><span class="cm">        $contents = @trim(fread($handle, 10));</span></div><div class='line' id='LC419'><span class="cm">        @fclose($handle);</span></div><div class='line' id='LC420'><span class="cm">        if ($contents != &#39;test -1&#39;) {</span></div><div class='line' id='LC421'><span class="cm">            return -1;</span></div><div class='line' id='LC422'><span class="cm">        }</span></div><div class='line' id='LC423'><span class="cm">        $handle = @fopen($CFG-&gt;wwwroot.&#39;/file.php/testslasharguments&#39;, &quot;r&quot;);</span></div><div class='line' id='LC424'><span class="cm">        $contents = trim(@fread($handle, 10));</span></div><div class='line' id='LC425'><span class="cm">        @fclose($handle);</span></div><div class='line' id='LC426'><span class="cm">        switch ($contents) {</span></div><div class='line' id='LC427'><span class="cm">            case &#39;test 1&#39;: return 1;</span></div><div class='line' id='LC428'><span class="cm">            case &#39;test 2&#39;: return 2;</span></div><div class='line' id='LC429'><span class="cm">            default:  return 0;</span></div><div class='line' id='LC430'><span class="cm">        }</span></div><div class='line' id='LC431'><span class="cm">    }</span></div><div class='line' id='LC432'><span class="cm">}*/</span></div><div class='line' id='LC433'><br/></div><div class='line' id='LC434'><span class="k">class</span> <span class="nc">problem_000012</span> <span class="k">extends</span> <span class="nx">problem_base</span> <span class="p">{</span></div><div class='line' id='LC435'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">title</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC436'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;Random questions data consistency&#39;</span><span class="p">;</span></div><div class='line' id='LC437'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC438'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">exists</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC439'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">global</span> <span class="nv">$DB</span><span class="p">;</span></div><div class='line' id='LC440'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nv">$DB</span><span class="o">-&gt;</span><span class="na">record_exists_select</span><span class="p">(</span><span class="s1">&#39;question&#39;</span><span class="p">,</span> <span class="s2">&quot;qtype = &#39;random&#39; AND parent &lt;&gt; id&quot;</span><span class="p">,</span> <span class="k">array</span><span class="p">());</span></div><div class='line' id='LC441'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC442'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">severity</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC443'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nx">SEVERITY_ANNOYANCE</span><span class="p">;</span></div><div class='line' id='LC444'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC445'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">description</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC446'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;&lt;p&gt;For random questions, question.parent should equal question.id. &#39;</span> <span class="o">.</span></div><div class='line' id='LC447'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;There are some questions in your database for which this is not true. &#39;</span> <span class="o">.</span></div><div class='line' id='LC448'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;One way that this could have happened is for random questions restored from backup before &#39;</span> <span class="o">.</span></div><div class='line' id='LC449'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;&lt;a href=&quot;http://tracker.moodle.org/browse/MDL-5482&quot;&gt;MDL-5482&lt;/a&gt; was fixed.&lt;/p&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC450'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC451'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">solution</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC452'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">global</span> <span class="nv">$CFG</span><span class="p">;</span></div><div class='line' id='LC453'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;&lt;p&gt;Upgrade to Moodle 1.9.1 or later, or manually execute the SQL&lt;/p&gt;&#39;</span> <span class="o">.</span></div><div class='line' id='LC454'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;&lt;pre&gt;UPDATE &#39;</span> <span class="o">.</span> <span class="nv">$CFG</span><span class="o">-&gt;</span><span class="na">prefix</span> <span class="o">.</span> <span class="s1">&#39;question SET parent = id WHERE qtype = \&#39;random\&#39; and parent &amp;lt;&gt; id;&lt;/pre&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC455'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC456'><span class="p">}</span></div><div class='line' id='LC457'><br/></div><div class='line' id='LC458'><span class="k">class</span> <span class="nc">problem_000013</span> <span class="k">extends</span> <span class="nx">problem_base</span> <span class="p">{</span></div><div class='line' id='LC459'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">title</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC460'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;Multi-answer questions data consistency&#39;</span><span class="p">;</span></div><div class='line' id='LC461'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC462'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">exists</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC463'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">global</span> <span class="nv">$DB</span><span class="p">;</span></div><div class='line' id='LC464'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$positionexpr</span> <span class="o">=</span> <span class="nv">$DB</span><span class="o">-&gt;</span><span class="na">sql_position</span><span class="p">(</span><span class="nv">$DB</span><span class="o">-&gt;</span><span class="na">sql_concat</span><span class="p">(</span><span class="s2">&quot;&#39;,&#39;&quot;</span><span class="p">,</span> <span class="s2">&quot;q.id&quot;</span><span class="p">,</span> <span class="s2">&quot;&#39;,&#39;&quot;</span><span class="p">),</span></div><div class='line' id='LC465'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$DB</span><span class="o">-&gt;</span><span class="na">sql_concat</span><span class="p">(</span><span class="s2">&quot;&#39;,&#39;&quot;</span><span class="p">,</span> <span class="s2">&quot;qma.sequence&quot;</span><span class="p">,</span> <span class="s2">&quot;&#39;,&#39;&quot;</span><span class="p">));</span></div><div class='line' id='LC466'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nv">$DB</span><span class="o">-&gt;</span><span class="na">record_exists_sql</span><span class="p">(</span><span class="s2">&quot;</span></div><div class='line' id='LC467'><span class="s2">                SELECT * FROM {question} q</span></div><div class='line' id='LC468'><span class="s2">                    JOIN {question_multianswer} qma ON </span><span class="si">$positionexpr</span><span class="s2"> &gt; 0</span></div><div class='line' id='LC469'><span class="s2">                WHERE qma.question &lt;&gt; q.parent&quot;</span><span class="p">)</span> <span class="o">||</span></div><div class='line' id='LC470'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$DB</span><span class="o">-&gt;</span><span class="na">record_exists_sql</span><span class="p">(</span><span class="s2">&quot;</span></div><div class='line' id='LC471'><span class="s2">                SELECT * FROM {question} q</span></div><div class='line' id='LC472'><span class="s2">                    JOIN {question} parent_q ON parent_q.id = q.parent</span></div><div class='line' id='LC473'><span class="s2">                WHERE q.category &lt;&gt; parent_q.category&quot;</span><span class="p">);</span></div><div class='line' id='LC474'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC475'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">severity</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC476'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nx">SEVERITY_ANNOYANCE</span><span class="p">;</span></div><div class='line' id='LC477'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC478'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">description</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC479'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;&lt;p&gt;For each sub-question whose id is listed in &#39;</span> <span class="o">.</span></div><div class='line' id='LC480'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;question_multianswer.sequence, its question.parent field should equal &#39;</span> <span class="o">.</span></div><div class='line' id='LC481'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;question_multianswer.question; and each sub-question should be in the same &#39;</span> <span class="o">.</span></div><div class='line' id='LC482'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;category as its parent. There are questions in your database for &#39;</span> <span class="o">.</span></div><div class='line' id='LC483'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;which this is not the case. One way that this could have happened is &#39;</span> <span class="o">.</span></div><div class='line' id='LC484'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;for multi-answer questions restored from backup before &#39;</span> <span class="o">.</span></div><div class='line' id='LC485'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;&lt;a href=&quot;http://tracker.moodle.org/browse/MDL-14750&quot;&gt;MDL-14750&lt;/a&gt; was fixed.&lt;/p&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC486'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC487'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">solution</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC488'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;&lt;p&gt;Upgrade to Moodle 1.9.1 or later, or manually execute the &#39;</span> <span class="o">.</span></div><div class='line' id='LC489'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;code in question_multianswer_fix_subquestion_parents_and_categories in &#39;</span> <span class="o">.</span></div><div class='line' id='LC490'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;&lt;a href=&quot;http://cvs.moodle.org/moodle/question/type/multianswer/db/upgrade.php?revision=1.1.10.2&amp;amp;view=markup&quot;&gt;/question/type/multianswer/db/upgrade.php&#39;</span> <span class="o">.</span></div><div class='line' id='LC491'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;from the 1.9 stable branch&lt;/a&gt;.&lt;/p&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC492'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC493'><span class="p">}</span></div><div class='line' id='LC494'><br/></div><div class='line' id='LC495'><span class="k">class</span> <span class="nc">problem_000014</span> <span class="k">extends</span> <span class="nx">problem_base</span> <span class="p">{</span></div><div class='line' id='LC496'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">title</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC497'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;Only multianswer and random questions should be the parent of another question&#39;</span><span class="p">;</span></div><div class='line' id='LC498'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC499'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">exists</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC500'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">global</span> <span class="nv">$DB</span><span class="p">;</span></div><div class='line' id='LC501'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nv">$DB</span><span class="o">-&gt;</span><span class="na">record_exists_sql</span><span class="p">(</span><span class="s2">&quot;</span></div><div class='line' id='LC502'><span class="s2">                SELECT * FROM {question} q</span></div><div class='line' id='LC503'><span class="s2">                    JOIN {question} parent_q ON parent_q.id = q.parent</span></div><div class='line' id='LC504'><span class="s2">                WHERE parent_q.qtype NOT IN (&#39;random&#39;, &#39;multianswer&#39;)&quot;</span><span class="p">);</span></div><div class='line' id='LC505'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC506'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">severity</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC507'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nx">SEVERITY_ANNOYANCE</span><span class="p">;</span></div><div class='line' id='LC508'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC509'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">description</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC510'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;&lt;p&gt;You have questions that violate this in your databse. &#39;</span> <span class="o">.</span></div><div class='line' id='LC511'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;You will need to investigate to determine how this happened.&lt;/p&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC512'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC513'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">solution</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC514'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;&lt;p&gt;It is impossible to give a solution without knowing more about &#39;</span> <span class="o">.</span></div><div class='line' id='LC515'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39; how the problem was caused. You may be able to get help from the &#39;</span> <span class="o">.</span></div><div class='line' id='LC516'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;&lt;a href=&quot;http://moodle.org/mod/forum/view.php?f=121&quot;&gt;Quiz forum&lt;/a&gt;.&lt;/p&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC517'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC518'><span class="p">}</span></div><div class='line' id='LC519'><br/></div><div class='line' id='LC520'><span class="k">class</span> <span class="nc">problem_000015</span> <span class="k">extends</span> <span class="nx">problem_base</span> <span class="p">{</span></div><div class='line' id='LC521'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">title</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC522'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;Question categories should belong to a valid context&#39;</span><span class="p">;</span></div><div class='line' id='LC523'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC524'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">exists</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC525'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">global</span> <span class="nv">$DB</span><span class="p">;</span></div><div class='line' id='LC526'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nv">$DB</span><span class="o">-&gt;</span><span class="na">record_exists_sql</span><span class="p">(</span><span class="s2">&quot;</span></div><div class='line' id='LC527'><span class="s2">            SELECT qc.*, (SELECT COUNT(1) FROM {question} q WHERE q.category = qc.id) AS numquestions</span></div><div class='line' id='LC528'><span class="s2">            FROM {question_categories} qc</span></div><div class='line' id='LC529'><span class="s2">                LEFT JOIN {context} con ON qc.contextid = con.id</span></div><div class='line' id='LC530'><span class="s2">            WHERE con.id IS NULL&quot;</span><span class="p">);</span></div><div class='line' id='LC531'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC532'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">severity</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC533'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nx">SEVERITY_ANNOYANCE</span><span class="p">;</span></div><div class='line' id='LC534'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC535'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">description</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC536'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">global</span> <span class="nv">$DB</span><span class="p">;</span></div><div class='line' id='LC537'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$problemcategories</span> <span class="o">=</span> <span class="nv">$DB</span><span class="o">-&gt;</span><span class="na">get_records_sql</span><span class="p">(</span><span class="s2">&quot;</span></div><div class='line' id='LC538'><span class="s2">            SELECT qc.id, qc.name, qc.contextid, (SELECT COUNT(1) FROM {question} q WHERE q.category = qc.id) AS numquestions</span></div><div class='line' id='LC539'><span class="s2">            FROM {question_categories} qc</span></div><div class='line' id='LC540'><span class="s2">                LEFT JOIN {context} con ON qc.contextid = con.id</span></div><div class='line' id='LC541'><span class="s2">            WHERE con.id IS NULL</span></div><div class='line' id='LC542'><span class="s2">            ORDER BY numquestions DESC, qc.name&quot;</span><span class="p">);</span></div><div class='line' id='LC543'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$table</span> <span class="o">=</span> <span class="s1">&#39;&lt;table&gt;&lt;thead&gt;&lt;tr&gt;&lt;th&gt;Cat id&lt;/th&gt;&lt;th&gt;Category name&lt;/th&gt;&#39;</span> <span class="o">.</span></div><div class='line' id='LC544'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s2">&quot;&lt;th&gt;Context id&lt;/th&gt;&lt;th&gt;Num Questions&lt;/th&gt;&lt;/tr&gt;&lt;/thead&gt;&lt;tbody&gt;</span><span class="se">\n</span><span class="s2">&quot;</span><span class="p">;</span></div><div class='line' id='LC545'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">foreach</span> <span class="p">(</span><span class="nv">$problemcategories</span> <span class="k">as</span> <span class="nv">$cat</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC546'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$table</span> <span class="o">.=</span> <span class="s2">&quot;&lt;tr&gt;&lt;td&gt;</span><span class="si">$cat-&gt;id</span><span class="s2">&lt;/td&gt;&lt;td&gt;&quot;</span> <span class="o">.</span> <span class="nx">s</span><span class="p">(</span><span class="nv">$cat</span><span class="o">-&gt;</span><span class="na">name</span><span class="p">)</span> <span class="o">.</span> <span class="s2">&quot;&lt;/td&gt;&lt;td&gt;&quot;</span> <span class="o">.</span></div><div class='line' id='LC547'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$cat</span><span class="o">-&gt;</span><span class="na">contextid</span> <span class="o">.</span><span class="s2">&quot;&lt;/td&gt;&lt;td&gt;</span><span class="si">$cat-&gt;numquestions</span><span class="s2">&lt;/td&gt;&lt;/tr&gt;</span><span class="se">\n</span><span class="s2">&quot;</span><span class="p">;</span></div><div class='line' id='LC548'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC549'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$table</span> <span class="o">.=</span> <span class="s1">&#39;&lt;/tbody&gt;&lt;/table&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC550'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;&lt;p&gt;All question categories are linked to a context id, and, &#39;</span> <span class="o">.</span></div><div class='line' id='LC551'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;the context they are linked to must exist. The following categories &#39;</span> <span class="o">.</span></div><div class='line' id='LC552'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;belong to a non-existant category:&lt;/p&gt;&#39;</span> <span class="o">.</span> <span class="nv">$table</span> <span class="o">.</span> <span class="s1">&#39;&lt;p&gt;Any of these &#39;</span> <span class="o">.</span></div><div class='line' id='LC553'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;categories that contain no questions can just be deleted form the database. &#39;</span> <span class="o">.</span></div><div class='line' id='LC554'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;Other categories will require more thought.&lt;/p&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC555'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC556'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">solution</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC557'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">global</span> <span class="nv">$CFG</span><span class="p">;</span></div><div class='line' id='LC558'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;&lt;p&gt;You can delete the empty categories by executing the following SQL:&lt;/p&gt;&lt;pre&gt;</span></div><div class='line' id='LC559'><span class="s1">DELETE FROM &#39;</span> <span class="o">.</span> <span class="nv">$CFG</span><span class="o">-&gt;</span><span class="na">prefix</span> <span class="o">.</span> <span class="s1">&#39;question_categories</span></div><div class='line' id='LC560'><span class="s1">WHERE</span></div><div class='line' id='LC561'><span class="s1">    NOT EXISTS (SELECT * FROM &#39;</span> <span class="o">.</span> <span class="nv">$CFG</span><span class="o">-&gt;</span><span class="na">prefix</span> <span class="o">.</span> <span class="s1">&#39;question q WHERE q.category = &#39;</span> <span class="o">.</span> <span class="nv">$CFG</span><span class="o">-&gt;</span><span class="na">prefix</span> <span class="o">.</span> <span class="s1">&#39;question_categories.id)</span></div><div class='line' id='LC562'><span class="s1">AND NOT EXISTS (SELECT * FROM &#39;</span> <span class="o">.</span> <span class="nv">$CFG</span><span class="o">-&gt;</span><span class="na">prefix</span> <span class="o">.</span> <span class="s1">&#39;context con WHERE contextid = con.id)</span></div><div class='line' id='LC563'><span class="s1">        &lt;/pre&gt;&lt;p&gt;Any remaining categories that contain questions will require more thought. &#39;</span> <span class="o">.</span></div><div class='line' id='LC564'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;People in the &lt;a href=&quot;http://moodle.org/mod/forum/view.php?f=121&quot;&gt;Quiz forum&lt;/a&gt; may be able to help.&lt;/p&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC565'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC566'><span class="p">}</span></div><div class='line' id='LC567'><br/></div><div class='line' id='LC568'><span class="k">class</span> <span class="nc">problem_000016</span> <span class="k">extends</span> <span class="nx">problem_base</span> <span class="p">{</span></div><div class='line' id='LC569'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">title</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC570'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;Question categories should belong to the same context as their parent&#39;</span><span class="p">;</span></div><div class='line' id='LC571'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC572'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">exists</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC573'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">global</span> <span class="nv">$DB</span><span class="p">;</span></div><div class='line' id='LC574'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nv">$DB</span><span class="o">-&gt;</span><span class="na">record_exists_sql</span><span class="p">(</span><span class="s2">&quot;</span></div><div class='line' id='LC575'><span class="s2">            SELECT parent_qc.id AS parent, child_qc.id AS child, child_qc.contextid</span></div><div class='line' id='LC576'><span class="s2">            FROM {question_categories} child_qc</span></div><div class='line' id='LC577'><span class="s2">                JOIN {question_categories} parent_qc ON child_qc.parent = parent_qc.id</span></div><div class='line' id='LC578'><span class="s2">            WHERE child_qc.contextid &lt;&gt; parent_qc.contextid&quot;</span><span class="p">);</span></div><div class='line' id='LC579'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC580'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">severity</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC581'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nx">SEVERITY_ANNOYANCE</span><span class="p">;</span></div><div class='line' id='LC582'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC583'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">description</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC584'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">global</span> <span class="nv">$DB</span><span class="p">;</span></div><div class='line' id='LC585'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$problemcategories</span> <span class="o">=</span> <span class="nv">$DB</span><span class="o">-&gt;</span><span class="na">get_records_sql</span><span class="p">(</span><span class="s2">&quot;</span></div><div class='line' id='LC586'><span class="s2">            SELECT</span></div><div class='line' id='LC587'><span class="s2">                parent_qc.id AS parentid, parent_qc.name AS parentname, parent_qc.contextid AS parentcon,</span></div><div class='line' id='LC588'><span class="s2">                child_qc.id AS childid, child_qc.name AS childname, child_qc.contextid AS childcon</span></div><div class='line' id='LC589'><span class="s2">            FROM {question_categories} child_qc</span></div><div class='line' id='LC590'><span class="s2">                JOIN {question_categories} parent_qc ON child_qc.parent = parent_qc.id</span></div><div class='line' id='LC591'><span class="s2">            WHERE child_qc.contextid &lt;&gt; parent_qc.contextid&quot;</span><span class="p">);</span></div><div class='line' id='LC592'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$table</span> <span class="o">=</span> <span class="s1">&#39;&lt;table&gt;&lt;thead&gt;&lt;tr&gt;&lt;th colspan=&quot;3&quot;&gt;Child category&lt;/th&gt;&lt;th colspan=&quot;3&quot;&gt;Parent category&lt;/th&gt;&lt;/tr&gt;&lt;tr&gt;&#39;</span> <span class="o">.</span></div><div class='line' id='LC593'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;&lt;th&gt;Id&lt;/th&gt;&lt;th&gt;Name&lt;/th&gt;&lt;th&gt;Context id&lt;/th&gt;&#39;</span> <span class="o">.</span></div><div class='line' id='LC594'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;&lt;th&gt;Id&lt;/th&gt;&lt;th&gt;Name&lt;/th&gt;&lt;th&gt;Context id&lt;/th&gt;&#39;</span> <span class="o">.</span></div><div class='line' id='LC595'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s2">&quot;&lt;/tr&gt;&lt;/thead&gt;&lt;tbody&gt;</span><span class="se">\n</span><span class="s2">&quot;</span><span class="p">;</span></div><div class='line' id='LC596'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">foreach</span> <span class="p">(</span><span class="nv">$problemcategories</span> <span class="k">as</span> <span class="nv">$cat</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC597'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$table</span> <span class="o">.=</span> <span class="s2">&quot;&lt;tr&gt;&lt;td&gt;</span><span class="si">$cat-&gt;childid</span><span class="s2">&lt;/td&gt;&lt;td&gt;&quot;</span> <span class="o">.</span> <span class="nx">s</span><span class="p">(</span><span class="nv">$cat</span><span class="o">-&gt;</span><span class="na">childname</span><span class="p">)</span> <span class="o">.</span></div><div class='line' id='LC598'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s2">&quot;&lt;/td&gt;&lt;td&gt;</span><span class="si">$cat-&gt;childcon</span><span class="s2">&lt;/td&gt;&lt;td&gt;</span><span class="si">$cat-&gt;parentid</span><span class="s2">&lt;/td&gt;&lt;td&gt;&quot;</span> <span class="o">.</span> <span class="nx">s</span><span class="p">(</span><span class="nv">$cat</span><span class="o">-&gt;</span><span class="na">parentname</span><span class="p">)</span> <span class="o">.</span></div><div class='line' id='LC599'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s2">&quot;&lt;/td&gt;&lt;td&gt;</span><span class="si">$cat-&gt;parentcon</span><span class="s2">&lt;/td&gt;&lt;/tr&gt;</span><span class="se">\n</span><span class="s2">&quot;</span><span class="p">;</span></div><div class='line' id='LC600'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC601'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$table</span> <span class="o">.=</span> <span class="s1">&#39;&lt;/tbody&gt;&lt;/table&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC602'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;&lt;p&gt;When one question category is the parent of another, then they &#39;</span> <span class="o">.</span></div><div class='line' id='LC603'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;should both belong to the same context. This is not true for the following categories:&lt;/p&gt;&#39;</span> <span class="o">.</span></div><div class='line' id='LC604'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$table</span><span class="p">;</span></div><div class='line' id='LC605'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC606'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">solution</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC607'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;&lt;p&gt;An automated solution is difficult. It depends whether the &#39;</span> <span class="o">.</span></div><div class='line' id='LC608'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;parent or child category is in the wrong pace.&#39;</span> <span class="o">.</span></div><div class='line' id='LC609'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;People in the &lt;a href=&quot;http://moodle.org/mod/forum/view.php?f=121&quot;&gt;Quiz forum&lt;/a&gt; may be able to help.&lt;/p&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC610'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC611'><span class="p">}</span></div><div class='line' id='LC612'><br/></div><div class='line' id='LC613'><span class="k">class</span> <span class="nc">problem_000017</span> <span class="k">extends</span> <span class="nx">problem_base</span> <span class="p">{</span></div><div class='line' id='LC614'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">title</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC615'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;Question categories tree structure&#39;</span><span class="p">;</span></div><div class='line' id='LC616'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC617'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">find_problems</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC618'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">global</span> <span class="nv">$DB</span><span class="p">;</span></div><div class='line' id='LC619'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">static</span> <span class="nv">$answer</span> <span class="o">=</span> <span class="k">null</span><span class="p">;</span></div><div class='line' id='LC620'><br/></div><div class='line' id='LC621'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span> <span class="p">(</span><span class="nb">is_null</span><span class="p">(</span><span class="nv">$answer</span><span class="p">))</span> <span class="p">{</span></div><div class='line' id='LC622'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$categories</span> <span class="o">=</span> <span class="nv">$DB</span><span class="o">-&gt;</span><span class="na">get_records</span><span class="p">(</span><span class="s1">&#39;question_categories&#39;</span><span class="p">,</span> <span class="k">array</span><span class="p">(),</span> <span class="s1">&#39;id&#39;</span><span class="p">);</span></div><div class='line' id='LC623'><br/></div><div class='line' id='LC624'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="c1">// Look for missing parents.</span></div><div class='line' id='LC625'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$missingparent</span> <span class="o">=</span> <span class="nx">health_category_find_missing_parents</span><span class="p">(</span><span class="nv">$categories</span><span class="p">);</span></div><div class='line' id='LC626'><br/></div><div class='line' id='LC627'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="c1">// Look for loops.</span></div><div class='line' id='LC628'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$loops</span> <span class="o">=</span> <span class="nx">health_category_find_loops</span><span class="p">(</span><span class="nv">$categories</span><span class="p">);</span></div><div class='line' id='LC629'><br/></div><div class='line' id='LC630'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$answer</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="nv">$missingparent</span><span class="p">,</span> <span class="nv">$loops</span><span class="p">);</span></div><div class='line' id='LC631'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC632'><br/></div><div class='line' id='LC633'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nv">$answer</span><span class="p">;</span></div><div class='line' id='LC634'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC635'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">exists</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC636'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">list</span><span class="p">(</span><span class="nv">$missingparent</span><span class="p">,</span> <span class="nv">$loops</span><span class="p">)</span> <span class="o">=</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">find_problems</span><span class="p">();</span></div><div class='line' id='LC637'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="o">!</span><span class="k">empty</span><span class="p">(</span><span class="nv">$missingparent</span><span class="p">)</span> <span class="o">||</span> <span class="o">!</span><span class="k">empty</span><span class="p">(</span><span class="nv">$loops</span><span class="p">);</span></div><div class='line' id='LC638'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC639'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">severity</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC640'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nx">SEVERITY_ANNOYANCE</span><span class="p">;</span></div><div class='line' id='LC641'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC642'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">description</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC643'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">list</span><span class="p">(</span><span class="nv">$missingparent</span><span class="p">,</span> <span class="nv">$loops</span><span class="p">)</span> <span class="o">=</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">find_problems</span><span class="p">();</span></div><div class='line' id='LC644'><br/></div><div class='line' id='LC645'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$description</span> <span class="o">=</span> <span class="s1">&#39;&lt;p&gt;The question categories should be arranged into tree &#39;</span> <span class="o">.</span></div><div class='line' id='LC646'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39; structures by the question_categories.parent field. Sometimes &#39;</span> <span class="o">.</span></div><div class='line' id='LC647'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39; this tree structure gets messed up.&lt;/p&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC648'><br/></div><div class='line' id='LC649'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$description</span> <span class="o">.=</span> <span class="nx">health_category_list_missing_parents</span><span class="p">(</span><span class="nv">$missingparent</span><span class="p">);</span></div><div class='line' id='LC650'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$description</span> <span class="o">.=</span> <span class="nx">health_category_list_loops</span><span class="p">(</span><span class="nv">$loops</span><span class="p">);</span></div><div class='line' id='LC651'><br/></div><div class='line' id='LC652'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nv">$description</span><span class="p">;</span></div><div class='line' id='LC653'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC654'><br/></div><div class='line' id='LC655'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC656'><span class="sd">     * Outputs resolutions to problems outlined in MDL-34684 with items having themselves as parent</span></div><div class='line' id='LC657'><span class="sd">     *</span></div><div class='line' id='LC658'><span class="sd">     * @link https://tracker.moodle.org/browse/MDL-34684</span></div><div class='line' id='LC659'><span class="sd">     * @return string Formatted html to be output to the browser with instructions and sql statements to run</span></div><div class='line' id='LC660'><span class="sd">     */</span></div><div class='line' id='LC661'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">solution</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC662'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">global</span> <span class="nv">$CFG</span><span class="p">;</span></div><div class='line' id='LC663'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">list</span><span class="p">(</span><span class="nv">$missingparent</span><span class="p">,</span> <span class="nv">$loops</span><span class="p">)</span> <span class="o">=</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">find_problems</span><span class="p">();</span></div><div class='line' id='LC664'><br/></div><div class='line' id='LC665'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$solution</span> <span class="o">=</span> <span class="s1">&#39;&lt;p&gt;Consider executing the following SQL queries. These fix &#39;</span> <span class="o">.</span></div><div class='line' id='LC666'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;the problem by moving some categories to the top level.&lt;/p&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC667'><br/></div><div class='line' id='LC668'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span> <span class="p">(</span><span class="o">!</span><span class="k">empty</span><span class="p">(</span><span class="nv">$missingparent</span><span class="p">))</span> <span class="p">{</span></div><div class='line' id='LC669'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$solution</span> <span class="o">.=</span> <span class="s2">&quot;&lt;pre&gt;UPDATE &quot;</span> <span class="o">.</span> <span class="nv">$CFG</span><span class="o">-&gt;</span><span class="na">prefix</span> <span class="o">.</span> <span class="s2">&quot;question_categories</span><span class="se">\n</span><span class="s2">&quot;</span> <span class="o">.</span></div><div class='line' id='LC670'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s2">&quot;        SET parent = 0</span><span class="se">\n</span><span class="s2">&quot;</span> <span class="o">.</span></div><div class='line' id='LC671'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s2">&quot;        WHERE id IN (&quot;</span> <span class="o">.</span> <span class="nb">implode</span><span class="p">(</span><span class="s1">&#39;,&#39;</span><span class="p">,</span> <span class="nb">array_keys</span><span class="p">(</span><span class="nv">$missingparent</span><span class="p">))</span> <span class="o">.</span> <span class="s2">&quot;);&lt;/pre&gt;</span><span class="se">\n</span><span class="s2">&quot;</span><span class="p">;</span></div><div class='line' id='LC672'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC673'><br/></div><div class='line' id='LC674'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span> <span class="p">(</span><span class="o">!</span><span class="k">empty</span><span class="p">(</span><span class="nv">$loops</span><span class="p">))</span> <span class="p">{</span></div><div class='line' id='LC675'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$solution</span> <span class="o">.=</span> <span class="s2">&quot;&lt;pre&gt;UPDATE &quot;</span> <span class="o">.</span> <span class="nv">$CFG</span><span class="o">-&gt;</span><span class="na">prefix</span> <span class="o">.</span> <span class="s2">&quot;question_categories</span><span class="se">\n</span><span class="s2">&quot;</span> <span class="o">.</span></div><div class='line' id='LC676'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s2">&quot;        SET parent = 0</span><span class="se">\n</span><span class="s2">&quot;</span> <span class="o">.</span></div><div class='line' id='LC677'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s2">&quot;        WHERE id IN (&quot;</span> <span class="o">.</span> <span class="nb">implode</span><span class="p">(</span><span class="s1">&#39;,&#39;</span><span class="p">,</span> <span class="nb">array_keys</span><span class="p">(</span><span class="nv">$loops</span><span class="p">))</span> <span class="o">.</span> <span class="s2">&quot;);&lt;/pre&gt;</span><span class="se">\n</span><span class="s2">&quot;</span><span class="p">;</span></div><div class='line' id='LC678'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC679'><br/></div><div class='line' id='LC680'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nv">$solution</span><span class="p">;</span></div><div class='line' id='LC681'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC682'><span class="p">}</span></div><div class='line' id='LC683'><br/></div><div class='line' id='LC684'><span class="sd">/**</span></div><div class='line' id='LC685'><span class="sd"> * Check course categories tree structure for problems.</span></div><div class='line' id='LC686'><span class="sd"> */</span></div><div class='line' id='LC687'><span class="k">class</span> <span class="nc">problem_000018</span> <span class="k">extends</span> <span class="nx">problem_base</span> <span class="p">{</span></div><div class='line' id='LC688'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC689'><span class="sd">     * Generate title for this problem.</span></div><div class='line' id='LC690'><span class="sd">     *</span></div><div class='line' id='LC691'><span class="sd">     * @return string Title of problem.</span></div><div class='line' id='LC692'><span class="sd">     */</span></div><div class='line' id='LC693'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">title</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC694'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;Course categories tree structure&#39;</span><span class="p">;</span></div><div class='line' id='LC695'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC696'><br/></div><div class='line' id='LC697'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC698'><span class="sd">     * Search for problems in the course categories.</span></div><div class='line' id='LC699'><span class="sd">     *</span></div><div class='line' id='LC700'><span class="sd">     * @uses $DB</span></div><div class='line' id='LC701'><span class="sd">     * @return array List of categories that contain missing parents or loops.</span></div><div class='line' id='LC702'><span class="sd">     */</span></div><div class='line' id='LC703'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">find_problems</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC704'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">global</span> <span class="nv">$DB</span><span class="p">;</span></div><div class='line' id='LC705'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">static</span> <span class="nv">$answer</span> <span class="o">=</span> <span class="k">null</span><span class="p">;</span></div><div class='line' id='LC706'><br/></div><div class='line' id='LC707'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span> <span class="p">(</span><span class="nb">is_null</span><span class="p">(</span><span class="nv">$answer</span><span class="p">))</span> <span class="p">{</span></div><div class='line' id='LC708'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$categories</span> <span class="o">=</span> <span class="nv">$DB</span><span class="o">-&gt;</span><span class="na">get_records</span><span class="p">(</span><span class="s1">&#39;course_categories&#39;</span><span class="p">,</span> <span class="k">array</span><span class="p">(),</span> <span class="s1">&#39;id&#39;</span><span class="p">);</span></div><div class='line' id='LC709'><br/></div><div class='line' id='LC710'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="c1">// Look for missing parents.</span></div><div class='line' id='LC711'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$missingparent</span> <span class="o">=</span> <span class="nx">health_category_find_missing_parents</span><span class="p">(</span><span class="nv">$categories</span><span class="p">);</span></div><div class='line' id='LC712'><br/></div><div class='line' id='LC713'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="c1">// Look for loops.</span></div><div class='line' id='LC714'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$loops</span> <span class="o">=</span> <span class="nx">health_category_find_loops</span><span class="p">(</span><span class="nv">$categories</span><span class="p">);</span></div><div class='line' id='LC715'><br/></div><div class='line' id='LC716'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$answer</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="nv">$missingparent</span><span class="p">,</span> <span class="nv">$loops</span><span class="p">);</span></div><div class='line' id='LC717'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC718'><br/></div><div class='line' id='LC719'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nv">$answer</span><span class="p">;</span></div><div class='line' id='LC720'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC721'><br/></div><div class='line' id='LC722'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC723'><span class="sd">     * Check if the problem exists.</span></div><div class='line' id='LC724'><span class="sd">     *</span></div><div class='line' id='LC725'><span class="sd">     * @return boolean True if either missing parents or loops found</span></div><div class='line' id='LC726'><span class="sd">     */</span></div><div class='line' id='LC727'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">exists</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC728'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">list</span><span class="p">(</span><span class="nv">$missingparent</span><span class="p">,</span> <span class="nv">$loops</span><span class="p">)</span> <span class="o">=</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">find_problems</span><span class="p">();</span></div><div class='line' id='LC729'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="o">!</span><span class="k">empty</span><span class="p">(</span><span class="nv">$missingparent</span><span class="p">)</span> <span class="o">||</span> <span class="o">!</span><span class="k">empty</span><span class="p">(</span><span class="nv">$loops</span><span class="p">);</span></div><div class='line' id='LC730'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC731'><br/></div><div class='line' id='LC732'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC733'><span class="sd">     * Set problem severity.</span></div><div class='line' id='LC734'><span class="sd">     *</span></div><div class='line' id='LC735'><span class="sd">     * @return constant Problem severity.</span></div><div class='line' id='LC736'><span class="sd">     */</span></div><div class='line' id='LC737'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">severity</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC738'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nx">SEVERITY_ANNOYANCE</span><span class="p">;</span></div><div class='line' id='LC739'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC740'><br/></div><div class='line' id='LC741'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC742'><span class="sd">     * Generate problem description.</span></div><div class='line' id='LC743'><span class="sd">     *</span></div><div class='line' id='LC744'><span class="sd">     * @return string HTML containing details of the problem.</span></div><div class='line' id='LC745'><span class="sd">     */</span></div><div class='line' id='LC746'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">description</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC747'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">list</span><span class="p">(</span><span class="nv">$missingparent</span><span class="p">,</span> <span class="nv">$loops</span><span class="p">)</span> <span class="o">=</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">find_problems</span><span class="p">();</span></div><div class='line' id='LC748'><br/></div><div class='line' id='LC749'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$description</span> <span class="o">=</span> <span class="s1">&#39;&lt;p&gt;The course categories should be arranged into tree &#39;</span> <span class="o">.</span></div><div class='line' id='LC750'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39; structures by the course_categories.parent field. Sometimes &#39;</span> <span class="o">.</span></div><div class='line' id='LC751'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39; this tree structure gets messed up.&lt;/p&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC752'><br/></div><div class='line' id='LC753'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$description</span> <span class="o">.=</span> <span class="nx">health_category_list_missing_parents</span><span class="p">(</span><span class="nv">$missingparent</span><span class="p">);</span></div><div class='line' id='LC754'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$description</span> <span class="o">.=</span> <span class="nx">health_category_list_loops</span><span class="p">(</span><span class="nv">$loops</span><span class="p">);</span></div><div class='line' id='LC755'><br/></div><div class='line' id='LC756'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nv">$description</span><span class="p">;</span></div><div class='line' id='LC757'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC758'><br/></div><div class='line' id='LC759'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC760'><span class="sd">     * Generate solution text.</span></div><div class='line' id='LC761'><span class="sd">     *</span></div><div class='line' id='LC762'><span class="sd">     * @uses $CFG</span></div><div class='line' id='LC763'><span class="sd">     * @return string HTML containing the suggested solution.</span></div><div class='line' id='LC764'><span class="sd">     */</span></div><div class='line' id='LC765'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">solution</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC766'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">global</span> <span class="nv">$CFG</span><span class="p">;</span></div><div class='line' id='LC767'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">list</span><span class="p">(</span><span class="nv">$missingparent</span><span class="p">,</span> <span class="nv">$loops</span><span class="p">)</span> <span class="o">=</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">find_problems</span><span class="p">();</span></div><div class='line' id='LC768'><br/></div><div class='line' id='LC769'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$solution</span> <span class="o">=</span> <span class="s1">&#39;&lt;p&gt;Consider executing the following SQL queries. These fix &#39;</span> <span class="o">.</span></div><div class='line' id='LC770'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s1">&#39;the problem by moving some categories to the top level.&lt;/p&gt;&#39;</span><span class="p">;</span></div><div class='line' id='LC771'><br/></div><div class='line' id='LC772'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span> <span class="p">(</span><span class="o">!</span><span class="k">empty</span><span class="p">(</span><span class="nv">$missingparent</span><span class="p">))</span> <span class="p">{</span></div><div class='line' id='LC773'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$solution</span> <span class="o">.=</span> <span class="s2">&quot;&lt;pre&gt;UPDATE &quot;</span> <span class="o">.</span> <span class="nv">$CFG</span><span class="o">-&gt;</span><span class="na">prefix</span> <span class="o">.</span> <span class="s2">&quot;course_categories</span><span class="se">\n</span><span class="s2">&quot;</span> <span class="o">.</span></div><div class='line' id='LC774'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s2">&quot;        SET parent = 0, depth = 1, path = CONCAT(&#39;/&#39;, id)</span><span class="se">\n</span><span class="s2">&quot;</span> <span class="o">.</span></div><div class='line' id='LC775'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s2">&quot;        WHERE id IN (&quot;</span> <span class="o">.</span> <span class="nb">implode</span><span class="p">(</span><span class="s1">&#39;,&#39;</span><span class="p">,</span> <span class="nb">array_keys</span><span class="p">(</span><span class="nv">$missingparent</span><span class="p">))</span> <span class="o">.</span> <span class="s2">&quot;);&lt;/pre&gt;</span><span class="se">\n</span><span class="s2">&quot;</span><span class="p">;</span></div><div class='line' id='LC776'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC777'><br/></div><div class='line' id='LC778'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span> <span class="p">(</span><span class="o">!</span><span class="k">empty</span><span class="p">(</span><span class="nv">$loops</span><span class="p">))</span> <span class="p">{</span></div><div class='line' id='LC779'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$solution</span> <span class="o">.=</span> <span class="s2">&quot;&lt;pre&gt;UPDATE &quot;</span> <span class="o">.</span> <span class="nv">$CFG</span><span class="o">-&gt;</span><span class="na">prefix</span> <span class="o">.</span> <span class="s2">&quot;course_categories</span><span class="se">\n</span><span class="s2">&quot;</span> <span class="o">.</span></div><div class='line' id='LC780'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s2">&quot;        SET parent = 0, depth = 1, path = CONCAT(&#39;/&#39;, id)</span><span class="se">\n</span><span class="s2">&quot;</span> <span class="o">.</span></div><div class='line' id='LC781'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s2">&quot;        WHERE id IN (&quot;</span> <span class="o">.</span> <span class="nb">implode</span><span class="p">(</span><span class="s1">&#39;,&#39;</span><span class="p">,</span> <span class="nb">array_keys</span><span class="p">(</span><span class="nv">$loops</span><span class="p">))</span> <span class="o">.</span> <span class="s2">&quot;);&lt;/pre&gt;</span><span class="se">\n</span><span class="s2">&quot;</span><span class="p">;</span></div><div class='line' id='LC782'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC783'><br/></div><div class='line' id='LC784'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nv">$solution</span><span class="p">;</span></div><div class='line' id='LC785'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC786'><span class="p">}</span></div><div class='line' id='LC787'><br/></div><div class='line' id='LC788'><span class="k">class</span> <span class="nc">problem_00000x</span> <span class="k">extends</span> <span class="nx">problem_base</span> <span class="p">{</span></div><div class='line' id='LC789'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">title</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC790'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;&#39;</span><span class="p">;</span></div><div class='line' id='LC791'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC792'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">exists</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC793'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="k">false</span><span class="p">;</span></div><div class='line' id='LC794'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC795'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">severity</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC796'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nx">SEVERITY_SIGNIFICANT</span><span class="p">;</span></div><div class='line' id='LC797'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC798'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">description</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC799'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;&#39;</span><span class="p">;</span></div><div class='line' id='LC800'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC801'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">function</span> <span class="nf">solution</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC802'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">global</span> <span class="nv">$CFG</span><span class="p">;</span></div><div class='line' id='LC803'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="s1">&#39;&#39;</span><span class="p">;</span></div><div class='line' id='LC804'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC805'><span class="p">}</span></div><div class='line' id='LC806'><br/></div><div class='line' id='LC807'><span class="cm">/*</span></div><div class='line' id='LC808'><br/></div><div class='line' id='LC809'><span class="cm">TODO:</span></div><div class='line' id='LC810'><br/></div><div class='line' id='LC811'><span class="cm">    session.save_path -- it doesn&#39;t really matter because we are already IN a session, right?</span></div><div class='line' id='LC812'><span class="cm">    detect unsupported characters in $CFG-&gt;wwwroot - see bug Bug #6091 - relative vs absolute path during backup/restore process</span></div><div class='line' id='LC813'><br/></div><div class='line' id='LC814'><span class="cm">*/</span></div></pre></div>
            </td>
          </tr>
        </table>
  </div>

  </div>
</div>

<a href="#jump-to-line" rel="facebox[.linejump]" data-hotkey="l" class="js-jump-to-line" style="display:none">Jump to Line</a>
<div id="jump-to-line" style="display:none">
  <form accept-charset="UTF-8" class="js-jump-to-line-form">
    <input class="linejump-input js-jump-to-line-field" type="text" placeholder="Jump to line&hellip;" autofocus>
    <button type="submit" class="button">Go</button>
  </form>
</div>

        </div>

      </div><!-- /.repo-container -->
      <div class="modal-backdrop"></div>
    </div><!-- /.container -->
  </div><!-- /.site -->


    </div><!-- /.wrapper -->

      <div class="container">
  <div class="site-footer">
    <ul class="site-footer-links right">
      <li><a href="https://status.github.com/">Status</a></li>
      <li><a href="http://developer.github.com">API</a></li>
      <li><a href="http://training.github.com">Training</a></li>
      <li><a href="http://shop.github.com">Shop</a></li>
      <li><a href="/blog">Blog</a></li>
      <li><a href="/about">About</a></li>

    </ul>

    <a href="/">
      <span class="mega-octicon octicon-mark-github"></span>
    </a>

    <ul class="site-footer-links">
      <li>&copy; 2013 <span title="0.10182s from github-fe113-cp1-prd.iad.github.net">GitHub</span>, Inc.</li>
        <li><a href="/site/terms">Terms</a></li>
        <li><a href="/site/privacy">Privacy</a></li>
        <li><a href="/security">Security</a></li>
        <li><a href="/contact">Contact</a></li>
    </ul>
  </div><!-- /.site-footer -->
</div><!-- /.container -->


    <div class="fullscreen-overlay js-fullscreen-overlay" id="fullscreen_overlay">
  <div class="fullscreen-container js-fullscreen-container">
    <div class="textarea-wrap">
      <textarea name="fullscreen-contents" id="fullscreen-contents" class="js-fullscreen-contents" placeholder="" data-suggester="fullscreen_suggester"></textarea>
          <div class="suggester-container">
              <div class="suggester fullscreen-suggester js-navigation-container" id="fullscreen_suggester"
                 data-url="/logan-reynolds/moodle/suggestions/commit">
              </div>
          </div>
    </div>
  </div>
  <div class="fullscreen-sidebar">
    <a href="#" class="exit-fullscreen js-exit-fullscreen tooltipped leftwards" title="Exit Zen Mode">
      <span class="mega-octicon octicon-screen-normal"></span>
    </a>
    <a href="#" class="theme-switcher js-theme-switcher tooltipped leftwards"
      title="Switch themes">
      <span class="octicon octicon-color-mode"></span>
    </a>
  </div>
</div>



    <div id="ajax-error-message" class="flash flash-error">
      <span class="octicon octicon-alert"></span>
      <a href="#" class="octicon octicon-remove-close close ajax-error-dismiss"></a>
      Something went wrong with that request. Please try again.
    </div>

  </body>
</html>

