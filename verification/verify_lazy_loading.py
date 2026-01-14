
from playwright.sync_api import sync_playwright

def verify_lazy_loading():
    with sync_playwright() as p:
        browser = p.chromium.launch(headless=True)
        page = browser.new_page()

        # Load the local HTML file
        page.goto("file:///app/index.html")

        # Check if the images have loading="lazy" attribute
        # We'll check a few key images we modified

        # 1. Check images in hidden sections
        lap_img = page.locator("#lap")
        exp_imgs = page.locator(".exp-img").all()

        print(f"Checking #lap loading attribute: {lap_img.get_attribute('loading')}")
        if lap_img.get_attribute('loading') != 'lazy':
            print("FAILED: #lap does not have loading='lazy'")

        for i, img in enumerate(exp_imgs):
            loading_attr = img.get_attribute('loading')
            print(f"Checking .exp-img [{i}] loading attribute: {loading_attr}")
            if loading_attr != 'lazy':
                print(f"FAILED: .exp-img [{i}] does not have loading='lazy'")

        # 2. Check footer icons
        footer_icon = page.locator("#icon-one img")
        print(f"Checking footer icon loading attribute: {footer_icon.get_attribute('loading')}")

        # 3. Check dynamic images (requires JS execution)
        # We need to wait for JS to render the dynamic content.
        # Since we are using file:// protocol and potentially missing some fetch calls if not served,
        # let's see if main.js runs. PROPS is local so it should run.

        # Wait for dynamic content to be present (e.g., cards)
        # page.wait_for_selector(".card-image img") # This might timeout if JS fails

        # Take a screenshot to verify layout didn't break
        page.screenshot(path="verification/lazy_load_verification.png")

        browser.close()

if __name__ == "__main__":
    verify_lazy_loading()
