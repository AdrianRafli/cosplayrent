package models

import (
    "time"
    "gorm.io/gorm"
)

type Category struct {
    ID        uint           `gorm:"primaryKey"`
    Name      string         `gorm:"size:255"`
    CreatedAt time.Time
    UpdatedAt time.Time
}

func (Category) TableName() string {
    return "categories"
}

// Migrasi untuk Category
func MigrateCategory(db *gorm.DB) {
    db.AutoMigrate(&Category{})
}
