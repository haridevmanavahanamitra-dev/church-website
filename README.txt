GRACE COMMUNITY CHURCH — PREMIUM LIGHT THEME
=============================================

WHAT CHANGED
- New palette: warm ivory/paper background, deep evergreen + antique gold
  accents (replaces the teal/amber SaaS look).
- New type pairing: Fraunces (serif, headings) + Public Sans (body/UI).
- New signature element: the "bulletin card" — a stamped, perforated card
  styled after a printed Sunday program. Used on the homepage "This Sunday"
  strip; the seal/perforation styles are reusable via .bulletin-card /
  .bulletin-seal.
- Softer, editorial radius scale instead of full-pill buttons everywhere.
- Cleaner nav matching the site's real pages (Home, About, Ministries,
  Events, Gallery, Resources, Counseling, FAQ, Contact).
- Restructured/cleaned pages: some duplicate ministries.php versions in the
  original files were split into ministries.php (programs) and
  counselling.php (pastoral care team), matching the nav.
- Added resources.php (was linked in the nav but had no page).
- Mobile nav closes automatically after a link is tapped; reveal animations
  now unobserve after firing (better performance); reduced-motion is
  respected; visible focus states added for keyboard users.

FILES
  index.php, about.php, ministries.php, events.php, gallery.php,
  pastors.php, members.php, counselling.php, resources.php, faq.php,
  contact.php         → pages
  preloader.php        → loading screen, included by inc/header.php
  inc/header.php        → shared <head>, topbar, header, nav
  inc/footer.php        → shared footer + closing tags
  inc/style.css         → all styling (design tokens at the top)
  inc/script.js         → preloader, nav, reveal animations, FAQ, forms

SETUP
1. Drop this whole folder onto your PHP server (e.g. htdocs/gracechurch).
2. Add your real photos into /images using the same filenames already
   referenced in the code (images (1).jpeg ... images (17).jpeg,
   ban.png, photo-1548625149-fc4a29cf7092.avif), or swap the <img src="">
   paths to your own filenames.
3. Update the placeholder phone numbers and email addresses in
   inc/header.php, inc/footer.php, and contact.php.
4. Open index.php through your PHP server (not by double-clicking the
   file) so the includes resolve correctly.

CUSTOMIZING THE PALETTE
All colors, radii, and shadows are CSS variables at the top of
inc/style.css under :root — change --evergreen / --gold / --ivory etc.
to retheme the entire site from one place.
