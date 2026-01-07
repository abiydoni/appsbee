# Deployment Guide (Shared Hosting)

This project is set up with CodeIgniter 4 and Tailwind CSS.
Because Tailwind is a build tool, you do **not** need to install Node.js or run `npm` on your shared hosting server.

## 1. Local Preparation
Before uploading, ensure you have generated the final CSS file:
```bash
npm run build
```
This creates `public/css/app.css`.

## 2. Uploading Files
### Option A: Uploading to the Root (Simplest)
1. Upload all files from your project (excluding `node_modules` and `.git`) to your hosting folder (e.g., `public_html` or `www`).
2. Your site will be accessible at `yourdomain.com/public`.
3. To make it accessible at `yourdomain.com`, you can move the **contents** of the `public` folder to the root (`public_html`).
   - Move `public/index.php`, `public/.htaccess`, etc., to `public_html`.
   - Edit `index.php` and change the path to the `app` folder:
     ```php
     // BEFORE
     require FCPATH . '../app/Config/Paths.php';
     
     // AFTER (if app is now in the same folder)
     require FCPATH . 'app/Config/Paths.php'; 
     ```

### Option B: The "Proper" Way (More Secure)
1. Create a folder *similarly named* to your project (e.g. `appsbee`) **outside** of `public_html`.
2. Upload `app`, `system`, `vendor`, `writable` (and `.env`) to that folder.
3. Upload the **contents** of `public` (including `css/app.css`) to `public_html`.
4. Edit `public_html/index.php`:
   ```php
   $pathsPath = FCPATH . '../appsbee/app/Config/Paths.php';
   ```

## 3. Configuration
1. Rename `env` to `.env` on the server (if not already).
2. Set `CI_ENVIRONMENT` to `production`.
3. Update `app.baseURL` in `.env` to your actual domain (e.g., `https://yourdomain.com/`).

## 4. Permissions
Ensure the `writable` folder and its subfolders are writable by the server (chmod 755 or 777 depending on hosting).
