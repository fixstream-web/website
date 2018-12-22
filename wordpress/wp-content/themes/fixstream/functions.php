<?php

/*
Since we're not using WordPress for pages, we have to manually handle routing to the proper template. This switch statement will need to reflect the entire catalog of pages.
*/
// **TODO this needs to handle nested pages (i.e. /platform/ecosystem/oracle)
  // ideally nested depth is flexible (right now hard coded up to 3 levels deep)
  // Basically just need the URL path and the locate_template source to include nesting i.e. platform/subpage
add_action('init', 'customRouter');
function customRouter() {
  $url_path = trim(parse_url(add_query_arg(array()), PHP_URL_PATH), '/');
  switch ($url_path) {
    case "platform": $load = locate_template('platform.php', true); break;
    case "platform/agent-less-auto-discovery": $load = locate_template('platform/agent-less-auto-discovery.php', true); break;
    case "platform/transaction-to-infra-correlation": $load = locate_template('platform/transaction-to-infra-correlation.php', true); break;
    case "platform/machine-learning": $load = locate_template('platform/machine-learning.php', true); break;
    case "platform/architecture": $load = locate_template('platform/architecture.php', true); break;
    case "platform/ecosystem": $load = locate_template('platform/ecosystem.php', true); break;
    case "platform/ecosystem/oracle": $load = locate_template('platform/ecosystem/oracle.php', true); break;
    case "platform/ecosystem/sap": $load = locate_template('platform/ecosystem/sap.php', true); break;
    case "platform/ecosystem/cherwell": $load = locate_template('platform/ecosystem/cherwell.php', true); break;
    case "platform/ecosystem/servicenow": $load = locate_template('platform/ecosystem/servicenow.php', true); break;
    case "platform/ecosystem/new-relic": $load = locate_template('platform/ecosystem/new-relic.php', true); break;
    case "solutions": $load = locate_template('solutions.php', true); break;
    case "solutions/auto-discovery-and-cmdb-update": $load = locate_template('solutions/auto-discovery-and-cmdb-update.php', true); break;
    case "solutions/application-mapping-and-event-correlation": $load = locate_template('solutions/application-mapping-and-event-correlation.php', true); break;
    case "solutions/infrastructure-monitoring": $load = locate_template('solutions/infrastructure-monitoring.php', true); break;
    case "solutions/capacity-exhausting-prediction": $load = locate_template('solutions/capacity-exhausting-prediction.php', true); break;
    case "solutions/noise-reduction": $load = locate_template('solutions/noise-reduction.php', true); break;
    case "solutions/incident-prediction": $load = locate_template('solutions/incident-prediction.php', true); break;
    case "solutions/migration": $load = locate_template('solutions/migration.php', true); break;
    case "solutions/oracle": $load = locate_template('solutions/oracle.php', true); break;
    case "solutions/sap": $load = locate_template('solutions/sap.php', true); break;
    case "solutions/cherwell": $load = locate_template('solutions/cherwell.php', true); break;
    case "solutions/servicenow": $load = locate_template('solutions/servicenow.php', true); break;
    case "solutions/new-relic": $load = locate_template('solutions/new-relic.php', true); break;
    case "solutions/managed-service-providers": $load = locate_template('solutions/managed-service-providers.php', true); break;
    case "resources": $load = locate_template('resources.php', true); break;
    case "resources/dummies": $load = locate_template('resources/dummies.php', true); break;
    case "resources/videos": $load = locate_template('resources/videos.php', true); break;
    case "resources/whitepapers": $load = locate_template('resources/whitepapers.php', true); break;
    case "resources/case-studies": $load = locate_template('resources/case-studies.php', true); break;
    case "resources/tech-docs": $load = locate_template('resources/tech-docs.php', true); break;
    case "customers": $load = locate_template('customers.php', true); break;
    case "customers/broadcom": $load = locate_template('customers/broadcom.php', true); break;
    case "customers/spxflow": $load = locate_template('customers/spxflow.php', true); break;
    case "customers/colv": $load = locate_template('customers/colv.php', true); break;
    case "customers/bt": $load = locate_template('customers/bt.php', true); break;
    case "whats-aiops": $load = locate_template('whats-aiops.php', true); break;
    case "company": $load = locate_template('company.php', true); break;
    case "blog": $load = locate_template('blog.php', true); break;
    default:
  }
  if ($load) {
        exit();
  }
}