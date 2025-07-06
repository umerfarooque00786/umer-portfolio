# 🚀 Vercel Deployment Setup

## Quick Setup Guide

### 1. 🌐 Deploy to Vercel

1. **Go to [Vercel](https://vercel.com)**
2. **Sign in with GitHub**
3. **Click "New Project"**
4. **Import your repository**: `umerfarooque00786/Umer-Portfolio`
5. **Configure Project**:
   - Framework Preset: `Other`
   - Root Directory: `./` (leave default)
   - Build Command: `npm run build`
   - Output Directory: `public` (leave default)
   - Install Command: `npm install`

### 2. 🔧 Environment Variables

Add these environment variables in Vercel dashboard:

**Required Variables:**
```
APP_NAME=Umer Farooque Portfolio
APP_ENV=production
APP_KEY=base64:4j87ZAb0006HAMzZpaVvQ33uK4RWEUyNdHwRHnePkU8=
APP_DEBUG=false
APP_URL=https://your-project-name.vercel.app
```

**Database Variables (Choose one option):**

#### Option A: PlanetScale (Recommended)
```
DB_CONNECTION=mysql
DB_HOST=aws.connect.psdb.cloud
DB_PORT=3306
DB_DATABASE=your-database-name
DB_USERNAME=your-username
DB_PASSWORD=your-password
```

#### Option B: Railway
```
DB_CONNECTION=mysql
DB_HOST=containers-us-west-xxx.railway.app
DB_PORT=6543
DB_DATABASE=railway
DB_USERNAME=root
DB_PASSWORD=your-password
```

#### Option C: Supabase
```
DB_CONNECTION=pgsql
DB_HOST=db.xxx.supabase.co
DB_PORT=5432
DB_DATABASE=postgres
DB_USERNAME=postgres
DB_PASSWORD=your-password
```

**Session & Cache:**
```
SESSION_DRIVER=cookie
CACHE_DRIVER=array
LOG_CHANNEL=stderr
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
```

**Mail Configuration:**
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your-mailtrap-username
MAIL_PASSWORD=your-mailtrap-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@yourdomain.com
MAIL_FROM_NAME=Umer Farooque Portfolio
MAIL_ADMIN_EMAIL=admin@yourdomain.com
```

### 3. 🗄️ Database Setup Options

#### Option A: PlanetScale (Free Tier Available)
1. Go to [PlanetScale](https://planetscale.com)
2. Create account and new database
3. Get connection string
4. Add to Vercel environment variables

#### Option B: Railway (Simple Setup)
1. Go to [Railway](https://railway.app)
2. Create MySQL database
3. Get connection details
4. Add to Vercel environment variables

#### Option C: Supabase (PostgreSQL)
1. Go to [Supabase](https://supabase.com)
2. Create new project
3. Go to Settings > Database
4. Get connection details
5. Add to Vercel environment variables

### 4. 📧 Email Service Setup

#### Option A: Mailtrap (Development)
1. Go to [Mailtrap](https://mailtrap.io)
2. Create account
3. Get SMTP credentials
4. Add to Vercel environment variables

#### Option B: SendGrid (Production)
1. Go to [SendGrid](https://sendgrid.com)
2. Create account and API key
3. Use these settings:
   ```
   MAIL_HOST=smtp.sendgrid.net
   MAIL_USERNAME=apikey
   MAIL_PASSWORD=your-sendgrid-api-key
   ```

### 5. 🚀 Deploy

1. **Click "Deploy"** in Vercel
2. **Wait for deployment** (usually 2-3 minutes)
3. **Your site will be live** at `https://your-project-name.vercel.app`

### 6. 🔧 Post-Deployment

1. **Test your website**
2. **Check all pages load correctly**
3. **Test contact form**
4. **Test CV download**
5. **Test admin panel login**

### 7. 🌐 Custom Domain (Optional)

1. In Vercel dashboard, go to your project
2. Click "Settings" > "Domains"
3. Add your custom domain
4. Update DNS records as instructed
5. Update `APP_URL` environment variable

## 🚨 Troubleshooting

### Common Issues:

1. **500 Error**: Check environment variables
2. **Database Connection Error**: Verify database credentials
3. **Assets Not Loading**: Check if build completed successfully
4. **Email Not Working**: Verify email service configuration

### Debug Steps:
1. Check Vercel function logs
2. Verify all environment variables are set
3. Test database connection
4. Check Laravel logs in Vercel dashboard

## 📞 Need Help?

If you encounter any issues:
1. Check the deployment logs in Vercel dashboard
2. Verify all environment variables are correctly set
3. Make sure your database is accessible
4. Test email configuration

---

**Your Laravel portfolio will be live at: `https://your-project-name.vercel.app`** 🎉
