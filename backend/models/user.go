package models

import "gorm.io/gorm"

type User struct {
    gorm.Model
    Name     string `gorm:"size:100;not null" json:"name" binding:"required"`
    Email    string `gorm:"size:100;not null;unique" json:"email" binding:"required,email"`
    Password string `gorm:"size:255;not null" json:"password" binding:"required"`
    Role     string `gorm:"type:enum('admin', 'renter');not null" json:"role" binding:"required,oneof=admin renter"`
}

func (User) TableName() string {
	return "User"
}