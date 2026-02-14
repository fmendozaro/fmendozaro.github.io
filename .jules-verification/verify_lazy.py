
from playwright.sync_api import sync_playwright

def verify_lazy_loading():
    with sync_playwright() as p:
        browser = p.chromium.launch(headless=True)
        page = browser.new_page()
        page.goto("http://localhost:3000/index.html")

        # Verify static images in index.html have loading="lazy"
        # Specifically checking images in the #experience section
        experience_images = page.locator("#experience img.exp-img")
        count = experience_images.count()
        print(f"Found {count} images in #experience section")

        for i in range(count):
            img = experience_images.nth(i)
            loading_attr = img.get_attribute("loading")
            src = img.get_attribute("src")
            print(f"Image {src}: loading='{loading_attr}'")
            if loading_attr != "lazy":
                print(f"FAIL: Image {src} does not have loading='lazy'")

        # Verify dynamic images in #projects section
        # The JS runs on document ready, but modifies the DOM.
        # Wait for the cards to be attached to DOM
        page.wait_for_selector("#cards .card-image img", state="attached")

        project_images = page.locator("#cards .card-image img")
        p_count = project_images.count()
        print(f"Found {p_count} images in #projects section")

        for i in range(p_count):
            img = project_images.nth(i)
            loading_attr = img.get_attribute("loading")
            src = img.get_attribute("src")
            print(f"Project Image {src}: loading='{loading_attr}'")
            if loading_attr != "lazy":
                 print(f"FAIL: Project Image {src} does not have loading='lazy'")

        # Verify footer images
        footer_images = page.locator("#footer img.social-icons")
        f_count = footer_images.count()
        print(f"Found {f_count} images in footer")
        for i in range(f_count):
            img = footer_images.nth(i)
            loading_attr = img.get_attribute("loading")
            print(f"Footer Image {i}: loading='{loading_attr}'")
            if loading_attr != "lazy":
                print(f"FAIL: Footer image {i} does not have loading='lazy'")

        # Reveal sections to take a meaningful screenshot
        page.evaluate("document.getElementById('experience').classList.remove('hide')")
        page.evaluate("document.getElementById('projects').classList.remove('hide')")

        # Take a screenshot
        page.screenshot(path=".jules-verification/verification.png", full_page=True)

        browser.close()

if __name__ == "__main__":
    verify_lazy_loading()
