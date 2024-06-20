package controllers

import (
    "backend/database"
    "backend/models"
    "net/http"

    "github.com/gin-gonic/gin"
)

func GetOrders(c *gin.Context) {
    var orders []models.Order
    if err := database.DB.Preload("User").Preload("Shop").Preload("Costume").Find(&orders).Error; err != nil {
        c.JSON(http.StatusInternalServerError, gin.H{"error": "Failed to fetch orders", "details": err.Error()})
        return
    }
    c.JSON(http.StatusOK, orders)
}

func GetCategories(c *gin.Context) {
    var categories []models.Category
    if err := database.DB.Find(&categories).Error; err != nil {
        c.JSON(http.StatusInternalServerError, gin.H{"error": "Failed to fetch categories"})
        return
    }
    c.JSON(http.StatusOK, gin.H{
		"status":  true,
		"message": "Data ditemukan",
		"data":    categories,
	})
}

func GetCategory(c *gin.Context) {
    id := c.Param("id")
    var category models.Category
    if err := database.DB.First(&category, id).Error; err != nil {
        c.JSON(http.StatusNotFound, gin.H{"error": "Category not found"})
        return
    }
    c.JSON(http.StatusOK, category)
}

func CreateCategory(c *gin.Context) {
    var input models.Category
    if err := c.ShouldBindJSON(&input); err != nil {
        c.JSON(http.StatusBadRequest, gin.H{"error": "Invalid input"})
        return
    }
    if err := database.DB.Create(&input).Error; err != nil {
        c.JSON(http.StatusInternalServerError, gin.H{"error": "Failed to create category"})
        return
    }
    c.JSON(http.StatusCreated, input)
}

func UpdateCategory(c *gin.Context) {
    id := c.Param("id")
    var category models.Category
    if err := database.DB.First(&category, id).Error; err != nil {
        c.JSON(http.StatusNotFound, gin.H{"error": "Category not found"})
        return
    }

    var input models.Category
    if err := c.ShouldBindJSON(&input); err != nil {
        c.JSON(http.StatusBadRequest, gin.H{"error": "Invalid input"})
        return
    }

    category.Name = input.Name
    if err := database.DB.Save(&category).Error; err != nil {
        c.JSON(http.StatusInternalServerError, gin.H{"error": "Failed to update category"})
        return
    }
    c.JSON(http.StatusOK, category)
}

func DeleteCategory(c *gin.Context) {
    id := c.Param("id")
    var category models.Category
    if err := database.DB.First(&category, id).Error; err != nil {
        c.JSON(http.StatusNotFound, gin.H{"error": "Category not found"})
        return
    }

    if err := database.DB.Delete(&category).Error; err != nil {
        c.JSON(http.StatusInternalServerError, gin.H{"error": "Failed to delete category"})
        return
    }
    c.JSON(http.StatusOK, gin.H{"message": "Category deleted"})
}
