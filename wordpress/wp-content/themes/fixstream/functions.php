<?php

/*
Since we're not using WordPress for pages, we have to manually handle routing to the proper template. This switch statement will need to reflect the entire catalog of pages.
*/
// **TODO this needs to handle nested pages (i.e. /platform/ecosystem/oracle)
  // ideally nested depth is flexible (right now hard coded up to 3 levels deep)
add_action('init', 'customRouter');
function customRouter() {
  $url_path = trim(parse_url(add_query_arg(array()), PHP_URL_PATH), '/');
  switch ($url_path) {
    case "platform": $load = locate_template('platform.php', true); break;
    case "agent-less-auto-discovery": $load = locate_template('agent-less-auto-discovery.php', true); break;
    case "transaction-to-infra-correlation": $load = locate_template('transaction-to-infra-correlation.php', true); break;
    case "machine-learning": $load = locate_template('machine-learning.php', true); break;
    case "architecture": $load = locate_template('architecture.php', true); break;
    case "ecosystem": $load = locate_template('ecosystem.php', true); break;
    case "oracle": $load = locate_template('oracle.php', true); break;
    case "sap": $load = locate_template('sap.php', true); break;
    case "cherwell": $load = locate_template('cherwell.php', true); break;
    case "servicenow": $load = locate_template('servicenow.php', true); break;
    case "new-relic": $load = locate_template('new-relic.php', true); break;
    case "solutions": $load = locate_template('solutions.php', true); break;
    case "auto-discovery-and-cmdb-update": $load = locate_template('auto-discovery-and-cmdb-update.php', true); break;
    case "#": $load = locate_template('#.php', true); break;
    case "#": $load = locate_template('#.php', true); break;
    case "#": $load = locate_template('#.php', true); break;
    case "#": $load = locate_template('#.php', true); break;
    case "#": $load = locate_template('#.php', true); break;
    case "#": $load = locate_template('#.php', true); break;
    case "#": $load = locate_template('#.php', true); break;
    case "#": $load = locate_template('#.php', true); break;
    case "#": $load = locate_template('#.php', true); break;
    case "#": $load = locate_template('#.php', true); break;
    case "#": $load = locate_template('#.php', true); break;
    case "#": $load = locate_template('#.php', true); break;
    case "resources": $load = locate_template('resources.php', true); break;
    case "dummies": $load = locate_template('dummies.php', true); break;
    case "videos": $load = locate_template('videos.php', true); break;
    case "whitepapers": $load = locate_template('whitepapers.php', true); break;
    case "case-studies": $load = locate_template('case-studies.php', true); break;
    case "tech-docs": $load = locate_template('tech-docs.php', true); break;
    case "customers": $load = locate_template('customers.php', true); break;
    case "broadcom": $load = locate_template('broadcom.php', true); break;
    case "spxflow": $load = locate_template('spxflow.php', true); break;
    case "colv": $load = locate_template('colv.php', true); break;
    case "bt": $load = locate_template('bt.php', true); break;
    case "whats-aiops": $load = locate_template('whats-aiops.php', true); break;
    case "company": $load = locate_template('company.php', true); break;
    case "blog": $load = locate_template('blog.php', true); break;
    default:
  }
  if ($load) {
        exit();
  }
}