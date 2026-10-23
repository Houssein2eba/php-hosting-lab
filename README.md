
---

# 📦 php-hosting-lab

A lab project demonstrating **multi-host PHP applications** running on **Windows + Ubuntu VM** with **NGINX reverse proxy** and **MariaDB** backend.

---

## 🏗️ Architecture Overview

```
                   Windows Host
                      |
              +-------+-------+
              |               |
          app.local        time.local
              |               |
              +-------+-------+
                      |
                 Ubuntu VM
                      |
                  Port 80
                      |
                    NGINX
                   /     \
                  /       \
        app.local          time.local
            |                  |
        :8080                :8081
            |                  |
       PHP App 1           PHP App 2
            |
         MariaDB
```

---

## 📖 Documentation

### 🔹 Components
- **Windows Host**  
  Entry point with local DNS mapping (`app.local`, `time.local`).

- **Ubuntu VM**  
  Runs NGINX on port 80, acting as a reverse proxy.

- **NGINX**  
  Routes traffic:
  - `app.local` → PHP App 1 (`:8080`)
  - `time.local` → PHP App 2 (`:8081`)

- **PHP Applications**  
  - **App 1**: Business logic application connected to MariaDB.  
  - **App 2**: Time service application.

- **MariaDB**  
  Database backend for PHP App 1.

---

### 🔹 Setup Instructions
1. **Clone the repository**
   ```bash
   git clone https://github.com/your-username/php-hosting-lab.git
   cd php-hosting-lab
   ```

2. **Configure Hosts (Windows)**
   Add entries to your `hosts` file:
   ```
   127.0.0.1 app.local
   127.0.0.1 time.local
   ```

3. **Provision Ubuntu VM**
   - Install NGINX
   - Configure reverse proxy rules for `app.local` and `time.local`

4. **Deploy PHP Apps**
   - Run App 1 on port `8080`
   - Run App 2 on port `8081`

5. **Setup MariaDB**
   - Create database and user
   - Import schema if provided

---

### 🔹 Usage
- Access **App 1** via:  
  👉 [http://app.local](http://app.local)  

- Access **App 2** via:  
  👉 [http://time.local](http://time.local)  

---

### 🔹 Future Improvements
- Dockerize the setup for portability  
- Add HTTPS with self-signed certificates  
- CI/CD pipeline integration  

---


