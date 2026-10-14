echo '/*!
 * Hover.css (http://ianlunn.github.io/Hover/)
 * Version: 2.2.1
 * Author: Ian Lunn @IanLunn
 * Author URL: http://ianlunn.co.uk/
 * Github: https://github.com/IanLunn/Hover
 *
 * Hover.css Copyright Ian Lunn 2017. Generated with Sass.
 */

/* ⚡ Bolt: Extracted used hover.css classes to reduce bundle size */' > extracted_hover.css

awk '
BEGIN { p = 0 }
/@-webkit-keyframes hvr-wobble-skew/ { p = 1 }
p == 1 { print; if ($0 == "}") { p = 0; print "" } }
' css/hover.css >> extracted_hover.css

awk '
BEGIN { p = 0 }
/^@keyframes hvr-wobble-skew/ { p = 1 }
p == 1 { print; if ($0 == "}") { p = 0; print "" } }
' css/hover.css >> extracted_hover.css

awk '
BEGIN { p = 0 }
/^\.hvr-wobble-skew \{/ { p = 1 }
p == 1 { print; if ($0 == "}") { p = 0; print "" } }
' css/hover.css >> extracted_hover.css

awk '
BEGIN { p = 0 }
/^\.hvr-wobble-skew:hover/ { p = 1 }
p == 1 { print; if ($0 == "}") { p = 0; print "" } }
' css/hover.css >> extracted_hover.css

awk '
BEGIN { p = 0 }
/^\.hvr-grow-rotate \{/ { p = 1 }
p == 1 { print; if ($0 == "}") { p = 0; print "" } }
' css/hover.css >> extracted_hover.css

awk '
BEGIN { p = 0 }
/^\.hvr-grow-rotate:hover/ { p = 1 }
p == 1 { print; if ($0 == "}") { p = 0; print "" } }
' css/hover.css >> extracted_hover.css

awk '
BEGIN { p = 0 }
/^\.hvr-grow-shadow \{/ { p = 1 }
p == 1 { print; if ($0 == "}") { p = 0; print "" } }
' css/hover.css >> extracted_hover.css

awk '
BEGIN { p = 0 }
/^\.hvr-grow-shadow:hover/ { p = 1 }
p == 1 { print; if ($0 == "}") { p = 0; print "" } }
' css/hover.css >> extracted_hover.css

cat extracted_hover.css
