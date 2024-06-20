package controllers

import (
    "backend/database"
    "backend/models"
    "github.com/gin-gonic/gin"
    // "gorm.io/gorm"
    "net/http"
	"golang.org/x/crypto/bcrypt"
)

// RegisterUserHandler handles user registration.
func RegisterUserHandler(c *gin.Context) {
    var input struct {
        Name         string `json:"name"`
        Email        string `json:"email"`
        Role         string `json:"role"`
        Password     string `json:"password"`
        ShopName     string `json:"shop_name"`
        City         string `json:"city"`
        Address      string `json:"address"`
        PhoneNumber  string `json:"phone_number"`
    }

    if err := c.ShouldBindJSON(&input); err != nil {
        c.JSON(http.StatusBadRequest, gin.H{"error": err.Error()})
        return
    }

    db := database.GetDB()

    // Create user
    user := models.User{
        Name:     input.Name,
        Email:    input.Email,
        Role:     input.Role,
        Password: input.Password,
    }
    if err := db.Create(&user).Error; err != nil {
        c.JSON(http.StatusInternalServerError, gin.H{"error": err.Error()})
        return
    }

    // Create shop if role is "owner"
    if input.Role == "owner" {
        shop := models.Shop{
            UserID:      user.ID,
            ShopName:    input.ShopName,
            City:        input.City,
            Address:     input.Address,
            PhoneNumber: input.PhoneNumber,
        }
        if err := db.Create(&shop).Error; err != nil {
            c.JSON(http.StatusInternalServerError, gin.H{"error": err.Error()})
            return
        }
    }

    c.JSON(http.StatusCreated, gin.H{"user": user})
}

type LoginRequest struct {
    Email    string `json:"email" binding:"required"`
    Password string `json:"password" binding:"required"`
}

func Login(c *gin.Context) {
    var req LoginRequest
    if err := c.ShouldBindJSON(&req); err != nil {
        c.JSON(http.StatusBadRequest, gin.H{"error": "Invalid request"})
        return
    }

    var user models.User
    if err := database.DB.Where("email = ?", req.Email).First(&user).Error; err != nil {
        c.JSON(http.StatusUnauthorized, gin.H{"error": "Invalid email or password"})
        return
    }

    if err := bcrypt.CompareHashAndPassword([]byte(user.Password), []byte(req.Password)); err != nil {
        c.JSON(http.StatusUnauthorized, gin.H{"error": "Invalid email or password"})
        return
    }

    // Create a token (this can be a JWT or a simple session token)
    token := "some-generated-token"

    c.JSON(http.StatusOK, gin.H{
        "user": gin.H{
            "id":    user.ID,
            "name":  user.Name,
            "email": user.Email,
            "role":  user.Role,
        },
        "token": token,
    })
}
