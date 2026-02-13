const mongoose = require("mongoose");

const postSchema = new mongoose.Schema({
    content: String,
    user: String,
    likes: { type: Number, default: 0 },
    comments: [{ text: String }]
});

module.exports = mongoose.model("Post", postSchema);
