<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreChatRequest;
use App\Http\Requests\UpdateChatRequest;
use App\Models\Chat;
use App\Models\ChatReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChatRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Chat $chat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChatRequest $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chat $chat)
    {
        //
    }

    // Create a new chat between two users
    public function createChat(Request $request)
    {
        // Validate the request
        $request->validate([
            'user_1_id' => 'required|exists:users,id',
            'user_2_id' => 'required|exists:users,id',
        ]);

        // Create a new chat record
        $chat = Chat::create([
            'user_1_id' => $request->user_1_id,
            'user_2_id' => $request->user_2_id,
        ]);

        return response()->json([
            'message' => 'Chat created successfully!',
            'chat_id' => $chat->id,
        ]);
    }

    // Send a new message in a chat
    public function sendMessage(Request $request)
    {
        // Validate the request
        $request->validate([
            'chat_id' => 'required|exists:chats,id',
            'message' => 'required|string',
        ]);

        // Get the current authenticated user (assuming user is logged in)
        $user = Auth::user();

        // Create a new chat reply (message)
        $chatReply = ChatReply::create([
            'chat_id' => $request->chat_id,
            'user_id' => $user->id,
            'message' => $request->message,
            'status'  => 'sent', // Default status is 'sent'
        ]);

        return response()->json([
            'message'    => 'Message sent successfully!',
            'chat_reply' => $chatReply,
        ]);
    }

    // Get the chat history (messages) for a specific chat
    public function getChatHistory($chatId)
    {
        // Fetch the chat with replies (messages)
        $chat = Chat::with(['chatReplies.user'])->find($chatId);

        if (! $chat) {
            return response()->json(['error' => 'Chat not found'], 404);
        }

        return response()->json([
            'chat'     => $chat,
            'messages' => $chat->chatReplies,
        ]);
    }

    // Update the status of a message (sent, delivered, read)
    public function updateMessageStatus(Request $request, $messageId)
    {
        // Validate the request
        $request->validate([
            'status' => 'required|in:sent,delivered,read',
        ]);

        // Find the message by ID
        $chatReply = ChatReply::find($messageId);

        if (! $chatReply) {
            return response()->json(['error' => 'Message not found'], 404);
        }

        // Update the status of the message
        $chatReply->update([
            'status' => $request->status,
        ]);

        return response()->json([
            'message'    => 'Message status updated successfully!',
            'chat_reply' => $chatReply,
        ]);
    }

}
