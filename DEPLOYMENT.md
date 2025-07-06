# 🚀 Laravel Portfolio Deployment Guide

This guide will help you deploy your Laravel portfolio project to GitHub and Vercel.

## 📋 Prerequisites

- Git installed on your machine
- GitHub account
- Vercel account
- Database service (PlanetScale, Railway, or Supabase)

## 🔧 Step 1: Prepare for Deployment

### 1.1 Environment Configuration
1. Copy `.env.example` to `.env.production`
2. Update the following variables:
   ```env
   APP_ENV=production
   APP_DEBUG=false
   APP_URL=https://your-domain.vercel.app
   DB_HOST=your-database-host
   DB_DATABASE=your-database-name
   DB_USERNAME=your-database-username
   DB_PASSWORD=your-database-password
   ```

### 1.2 Generate Application Key
```bash
php artisan key:generate
```

### 1.3 Build Assets
```bash
npm install
npm run build
```

## 📚 Step 2: GitHub Repository Setup

### 2.1 Initialize Git Repository
```bash
git init
git add .
git commit -m "Initial commit: Laravel Portfolio Project"
```

### 2.2 Create GitHub Repository
1. Go to [GitHub](https://github.com)
2. Click "New Repository"
3. Name it `laravel-portfolio` or `umer-portfolio`
4. Don't initialize with README (we already have files)
5. Click "Create Repository"

### 2.3 Push to GitHub
```bash
git remote add origin https://github.com/YOUR_USERNAME/YOUR_REPO_NAME.git
git branch -M main
git push -u origin main
```

## 🌐 Step 3: Database Setup

### Option A: PlanetScale (Recommended)
1. Sign up at [PlanetScale](https://planetscale.com)
2. Create a new database
3. Get connection details
4. Update your environment variables

### Option B: Railway
1. Sign up at [Railway](https://railway.app)
2. Create a MySQL database
3. Get connection details
4. Update your environment variables

### Option C: Supabase
1. Sign up at [Supabase](https://supabase.com)
2. Create a new project
3. Go to Settings > Database
4. Get connection details
5. Update your environment variables

## ☁️ Step 4: Vercel Deployment

### 4.1 Connect GitHub to Vercel
1. Go to [Vercel](https://vercel.com)
2. Sign up/Login with GitHub
3. Click "New Project"
4. Import your GitHub repository

### 4.2 Configure Environment Variables
In Vercel dashboard, add these environment variables:
```
APP_NAME=Umer Farooque Portfolio
APP_ENV=production
APP_KEY=your-generated-app-key
APP_DEBUG=false
APP_URL=https://your-domain.vercel.app
DB_CONNECTION=mysql
DB_HOST=your-database-host
DB_PORT=3306
DB_DATABASE=your-database-name
DB_USERNAME=your-database-username
DB_PASSWORD=your-database-password
SESSION_DRIVER=cookie
CACHE_DRIVER=array
LOG_CHANNEL=stderr
MAIL_MAILER=smtp
MAIL_HOST=your-mail-host
MAIL_PORT=587
MAIL_USERNAME=your-mail-username
MAIL_PASSWORD=your-mail-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@yourdomain.com
MAIL_FROM_NAME=Umer Farooque Portfolio
MAIL_ADMIN_EMAIL=admin@yourdomain.com
```

### 4.3 Deploy
1. Click "Deploy"
2. Wait for deployment to complete
3. Your site will be available at `https://your-project.vercel.app`

## 🗄️ Step 5: Database Migration

After deployment, run migrations:
1. Go to Vercel dashboard
2. Open your project
3. Go to "Functions" tab
4. Find your function and click "View Function Logs"
5. Or use Vercel CLI:
   ```bash
   vercel env pull .env.production
   php artisan migrate --force
   ```

## 📧 Step 6: Email Configuration

### Option A: Mailtrap (Development/Testing)
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your-mailtrap-username
MAIL_PASSWORD=your-mailtrap-password
```

### Option B: SendGrid (Production)
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.sendgrid.net
MAIL_PORT=587
MAIL_USERNAME=apikey
MAIL_PASSWORD=your-sendgrid-api-key
```

## 🔧 Step 7: Custom Domain (Optional)

1. In Vercel dashboard, go to your project
2. Click "Settings" > "Domains"
3. Add your custom domain
4. Update DNS records as instructed
5. Update `APP_URL` in environment variables

## 🚨 Troubleshooting

### Common Issues:

1. **500 Error**: Check environment variables and database connection
2. **Assets not loading**: Ensure `npm run build` was successful
3. **Database errors**: Verify database credentials and run migrations
4. **Email not working**: Check email service configuration

### Debug Steps:
1. Check Vercel function logs
2. Verify environment variables
3. Test database connection
4. Check file permissions

## 📝 Post-Deployment Checklist

- [ ] Website loads correctly
- [ ] All pages are accessible
- [ ] Contact form works
- [ ] CV download works
- [ ] Admin panel is accessible
- [ ] Database is connected
- [ ] Email notifications work
- [ ] SSL certificate is active
- [ ] Custom domain configured (if applicable)

## 🔄 Future Updates

To update your deployed application:
1. Make changes locally
2. Test thoroughly
3. Commit and push to GitHub:
   ```bash
   git add .
   git commit -m "Update: description of changes"
   git push origin main
   ```
4. Vercel will automatically redeploy

## 📞 Support

If you encounter issues:
1. Check Vercel documentation
2. Review Laravel deployment guides
3. Check GitHub Issues for similar problems
4. Contact support if needed

---

**Happy Deploying! 🎉**
