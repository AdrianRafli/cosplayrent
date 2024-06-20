package controllers

import (
    "backend/database"
    "backend/models"
    "github.com/gin-gonic/gin"
    // "gorm.io/gorm"
    "net/http"
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
